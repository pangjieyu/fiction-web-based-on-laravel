@extends('layout.default')
@section('title, NEW')
@section('content')
    @include('layout._header')
    <hr class="featurette-divider">
    <div class="container col-md-8">
        <div class="col-sm-4">
            <h3>书籍信息</h3>
        </div>
        <br>
        <div>
            <form method="POST" action="/book/save">
                <div class="form-group row">
                    <label for="inputBookName" class="col-sm-2 form-control-label">书籍名称：</label>
                    <div class="col-sm-10">
                        <input type="text" id="title" placeholder="请输入书籍名称">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="introduction" class="col-sm-2 form-control-label">简要介绍：</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="introduction" name="introduction" rows="3"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="type" class="col-sm-2 form-control-label">书籍分类：</label>
                    <div class="col-sm-10">
                        <select id="type" class="form-control" name="type">
                            <option>select</option>
                        </select>
                    </div>

                </div>
                <div class="form-group row">
                    <label  class="col-sm-2 form-control-label">封面文件：</label>
                    <div class="col-sm-10">
                        <label class="file">
                            <input type="file" id="file" name="file">
                            <span class="file-custom"></span>
                        </label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">提交</button>
            </form>
        </div>
    </div>
    <hr class="featurette-divider">
@stop

