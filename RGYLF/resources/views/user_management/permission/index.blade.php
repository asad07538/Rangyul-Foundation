@extends('admin_layout.app', ['title' => 'Permissions'])

@section('header_text')
Permissions
@endsection
@section('content-header')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Permissions</li>
                </ol>
            </div><!-- /.col -->
            <div class="col-sm-6 text-right">
                <!-- <h1 class="m-0">Dashboard</h1> -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
@endsection
@section('content')
<!-- Main content -->
<section class="content">
    <div class="container-fluid">



        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" />
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <style>
            .tree,
            .tree ul {

                margin: 0;

                padding: 0;

                list-style: none
            }

            .panel-primary>.panel-heading {
                color: #fff;
                background-color: #606ec3;
                border-color: #606ec3;
            }

            .panel-primary {

                border-color: #606ec3;
                margin: 3%;

            }

            .tree ul {

                margin-left: 1em;

                position: relative
            }

            .tree ul ul {

                margin-left: .5em
            }

            .tree ul:before {

                content: "";

                display: block;

                width: 0;

                position: absolute;

                top: 0;

                bottom: 0;

                left: 0;

                border-left: 1px solid
            }

            .tree li {

                margin: 0;

                padding: 0 1em;

                line-height: 2em;

                color: #369;

                font-weight: 700;

                position: relative
            }

            .tree ul li:before {

                content: "";

                display: block;

                width: 10px;

                height: 0;

                border-top: 1px solid;

                margin-top: -1px;

                position: absolute;

                top: 1em;

                left: 0
            }

            .tree ul li:last-child:before {

                background: #f4f6f9;

                height: auto;

                top: 1em;

                bottom: 0
            }

            .indicator {

                margin-right: 5px;

            }

            .tree li a {

                text-decoration: none;

                color: #369;

            }

            .tree li button,
            .tree li button:active,
            .tree li button:focus {

                text-decoration: none;

                color: #369;

                border: none;

                background: transparent;

                margin: 0px 0px 0px 0px;

                padding: 0px 0px 0px 0px;

                outline: 0;

            }
        </style>

        <ul id="tree1">
            @foreach($permissions->where('parent_id',null) as $key => $permisssion)
            <li> <input type="checkbox"  id="parent_id" name="parent_id" value={{ $permisssion->id }}">
                <label for="parent_id"> {{ $permisssion->name }}</label><br>
            </li>
            <ul>
                @foreach($permisssion->child as $key => $child)
                    <li>
                        <input type="checkbox" id="child->id" name="parent_id" value="{{ $child->id}}">
                        <label for="vehicle1"> {{ $child->name}}</label><br>
                    </li>
                @endforeach
            </ul>
            @endforeach
        </ul>

        <script>

            $.fn.extend({
                treed: function (o) {

                    var openedClass = 'glyphicon-minus-sign';
                    var closedClass = 'glyphicon-plus-sign';

                    if (typeof o != 'undefined') {
                        if (typeof o.openedClass != 'undefined') {
                            openedClass = o.openedClass;
                        }
                        if (typeof o.closedClass != 'undefined') {
                            closedClass = o.closedClass;
                        }
                    };

                    /* initialize each of the top levels */
                    var tree = $(this);
                    tree.addClass("tree");
                    tree.find('li').has("ul").each(function () {
                        var branch = $(this);
                        branch.prepend("");
                        branch.addClass('branch');
                        branch.on('click', function (e) {
                            if (this == e.target) {
                                var icon = $(this).children('i:first');
                                icon.toggleClass(openedClass + " " + closedClass);
                                $(this).children().children().toggle();
                            }
                        })
                        branch.children().children().toggle();
                    });
                    /* fire event from the dynamically added icon */
                    tree.find('.branch .indicator').each(function () {
                        $(this).on('click', function () {
                            $(this).closest('li').click();
                        });
                    });
                    /* fire event to open branch if the li contains an anchor instead of text */
                    tree.find('.branch>a').each(function () {
                        $(this).on('click', function (e) {
                            $(this).closest('li').click();
                            e.preventDefault();
                        });
                    });
                    /* fire event to open branch if the li contains a button instead of text */
                    tree.find('.branch>button').each(function () {
                        $(this).on('click', function (e) {
                            $(this).closest('li').click();
                            e.preventDefault();
                        });
                    });
                }
            });
            /* Initialization of treeviews */
            $('#tree1').treed();
        </script>

    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection