@extends('layout.master')
@section('parentPageTitle', 'Forms')
@section('title', 'Markdown')


@section('content')

<!-- Page header section  -->
<div class="block-header">
    <div class="row clearfix">
        <div class="col-xl-5 col-md-5 col-sm-12">
            <h1>Hi, Welcomeback!</h1>
            <span>JustDo @yield('title'),</span>
        </div>            
        <div class="col-xl-7 col-md-7 col-sm-12 text-md-right">
            
        </div>
    </div>
</div>

<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <h2>Markdown Editor</h2>
            </div>
            <div class="body">                            
                <p class="margin-bottom-30">Markdown editing meet Bootstrap</p>
                <textarea id="markdown-editor" name="markdown-content" data-provide="markdown" rows="10"></textarea>
            </div>
        </div>
    </div>
</div>

@stop

@section('page-styles')
<link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-markdown/bootstrap-markdown.min.css') }}">
@stop

@section('vendor-script')
<script src="{{ asset('assets/vendor/markdown/markdown.js') }}"></script>
<script src="{{ asset('assets/vendor/to-markdown/to-markdown.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap-markdown/bootstrap-markdown.js') }}"></script>
@stop

@section('page-script')
<script>
    $(function() {
        // markdown editor
        var initContent = '<h4>Hello there</h4> ' +
            '<p>How are you? I have below task for you :</p> ' +
            '<p>Select from this text... Click the bold on THIS WORD and make THESE ONE italic, ' +
            'link GOOGLE to google.com, ' +
            'test to insert image (and try to tab after write the image description)</p>' +
            '<p>Test Preview And ending here...</p> ' +
            '<p>Click "List"</p> Enjoy!';

        $('#markdown-editor').text(toMarkdown(initContent));
    });
</script>
@stop