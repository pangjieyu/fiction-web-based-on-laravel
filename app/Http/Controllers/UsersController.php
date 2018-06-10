<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Policies\UserPolicy;
use Illuminate\Http\Request;
use Auth;
use Mail;

class UsersController extends Controller
{


    public function __construct()
    {

        //用户权限
        $this->middleware('auth', [
            'except' => ['show', 'create', 'store','index','confirmEmail']
        ]);
        //游客权限
        $this->middleware('guest', [
            'only' => ['create']
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = (new \App\Models\User)->paginate(10);
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'name' => 'required|max:50',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|confirmed|min:6'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $this->sendEmailConfirmationTo($user);
//        Auth::login($user);
//        session()->flash('success','欢迎');
        session()->flash('success','已发送验证邮件');

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(User $user)
    {
        //
        $this->authorize('update', $user);
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param User $user
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(User $user, Request $request)
    {
        //
        $this->validate($request, [
            'name' => 'required|max:50',
            'password' => 'nullable|confirmed|min:6'
        ]);
        $this->authorize('update', $user);

        $data = [];
        $data['name'] = $request->name;
        if($request->password) {
            $data['password'] = bcrypt($request->password);
        }
        $user->update($data);

        session()->flash('success', '个人资料更新成功');

        return redirect()->route('users.show', $user->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     * @throws \Exception
     */
    public function destroy(User $user)
    {
        //
        $this->authorize('destroy',$user);
        $books = Book::where('authorId','=',$user->id)->get();
//        dd($books);
        if(count($books)!=0) {
            foreach ($books as $book) {
                BookController::del($book->bookId);
            }
        }
        $user->delete();
        session()->flash('success','成功删除用户');
        return back();
    }

    public function sendEmailConfirmationTo($user) {
        $view = 'emails.confirm';
        $data = compact('user');
        $from = 'pang.jie.yu@163.com';
        $name = 'pang.jie.yu@163.com';
        $to = $user->email;
        $subject = "感谢注册 P-Fiction！请确认你的邮箱。";
        Mail::send($view,$data,function ($message) use ($from,$name,$to,$subject) {
            $message->from($from,$name)->to($to)->subject($subject);
        });
    }

    public function confirmEmail($token) {
        $user = (new \App\Models\User)->where('activation_token',$token)->firstOrFail();
        $user->activation_token = null;
        $user->activated = true;
        $user->save();

        Auth::login($user);
        session()->flash('success','验证成功');
        return redirect()->route('users.show',[$user]);
    }
}
