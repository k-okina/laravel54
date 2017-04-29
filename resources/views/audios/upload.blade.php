@extends('layouts.app')

@section('content')
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset("assets/css/style.css") }}">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset("assets/css/fileupload/jquery.fileupload.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/css/fileupload/jquery.fileupload-ui.css") }}">

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="content">
                        <div class="title m-b-md">
                            Upload Audio file
                        </div>
                        <div class="container">
                            <!-- The file upload form used as target for the file upload widget -->
                            <form id="fileupload" action="{{ url("/movie") }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <!-- Redirect browsers with JavaScript disabled to the origin page -->
                                <noscript><input type="hidden" name="redirect" value="https://blueimp.github.io/jQuery-File-Upload/"></noscript>
                                <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
                                <div class="row fileupload-buttonbar">
                                    <div class="col-lg-7">
                                        <!-- The fileinput-button span is used to style the file input field as button -->
                                        <span class="btn btn-success fileinput-button">
                                            <i class="glyphicon glyphicon-plus"></i>
                                            <span>Add files...</span>
                                            <input type="file" name="files[]" multiple>
                                        </span>
                                        <button type="submit" class="btn btn-primary start">
                                            <i class="glyphicon glyphicon-upload"></i>
                                            <span>Start upload</span>
                                        </button>
                                        <button type="reset" class="btn btn-warning cancel">
                                            <i class="glyphicon glyphicon-ban-circle"></i>
                                            <span>Cancel upload</span>
                                        </button>
                                        <span class="fileupload-process"></span>
                                    </div>
                                    <!-- The global progress state -->
                                    <div class="col-lg-5 fileupload-progress fade">
                                        <!-- The global progress bar -->
                                        <div class="progress progress-striped active" role="progressbar"
                                             aria-valuemin="0" aria-valuemax="100">
                                            <div class="progress-bar progress-bar-success" style="width:0%;"></div>
                                        </div>
                                        <!-- The extended global progress state -->
                                        <div class="progress-extended">&nbsp;</div>
                                    </div>
                                </div>
                                <!-- The table listing the files available for upload/download -->
                                <table role="presentation" class="table table-striped">
                                    <tbody class="files"></tbody>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="javascript">
        <!-- The template to display files available for upload -->
        <script id="template-upload" type="text/x-tmpl">
            {% for (var i=0, file; file=o.files[i]; i++) { %}
                <tr class="template-upload fade">
                    <td>
                        <span class="preview"></span>
                    </td>
                    <td>
                        <p class="name">{%=file.name%}</p>
                        <strong class="error text-danger"></strong>
                    </td>
                    <td>
                        <p class="size">Processing...</p>
                        <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="progress-bar progress-bar-success" style="width:0%;"></div></div>
                    </td>
                    <td>
                        {% if (!i && !o.options.autoUpload) { %}
                            <button class="btn btn-primary start" disabled>
                                <i class="glyphicon glyphicon-upload"></i>
                                <span>Start</span>
                            </button>
                            <button class="btn btn-warning cancel">
                                <i class="glyphicon glyphicon-ban-circle"></i>
                                <span>Cancel</span>
                            </button>
                        {% } %}
                    </td>
                </tr>
            {% } %}
        </script>

        <!-- The template to display files available for download -->
        <script id="template-download">
        </script>

        <script src="{{ asset("assets/js/jquery.min.js") }}"></script>
        <!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
        <script src="{{ asset("assets/js/jquery.ui.widget.js") }}"></script>
        <!-- The Templates plugin is included to render the upload/download listings -->
        <script src="{{ asset("assets/js/fileupload/tmpl.min.js") }}"></script>
        <!-- The Load Image plugin is included for the preview images and image resizing functionality -->
        <script src="{{ asset("assets/js/fileupload/load-image.all.min.js") }}"></script>
        <!-- The Canvas to Blob plugin is included for image resizing functionality -->
        <script src="{{ asset("assets/js/fileupload/canvas-to-blob.min.js") }}"></script>
        <!-- Bootstrap JS is not required, but included for the responsive demo navigation -->
        <script src="{{ asset("assets/js/bootstrap.min.js") }}"></script>
        <!-- blueimp Gallery script -->
        <script src="{{ asset("assets/js/fileupload/jquery.blueimp-gallery.min.js") }}"></script>
        <!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
        <script src="{{ asset("assets/js/fileupload/jquery.iframe-transport.js") }}"></script>
        <!-- The basic File Upload plugin -->
        <script src="{{ asset("assets/js/fileupload/jquery.fileupload.js") }}"></script>
        <!-- The File Upload processing plugin -->
        <script src="{{ asset("assets/js/fileupload/jquery.fileupload-process.js") }}"></script>
        <!-- The File Upload image preview & resize plugin -->
        <script src="{{ asset("assets/js/fileupload/jquery.fileupload-image.js") }}"></script>
        <!-- The File Upload audio preview plugin -->
        <script src="{{ asset("assets/js/fileupload/jquery.fileupload-audio.js") }}"></script>
        <!-- The File Upload video preview plugin -->
        <script src="{{ asset("assets/js/fileupload/jquery.fileupload-video.js") }}"></script>
        <!-- The File Upload validation plugin -->
    <!-- <script src="{{ asset("assets/js/fileupload/jquery.fileupload-validate.js") }}"></script> -->
        <!-- The File Upload user interface plugin -->
        <script src="{{ asset("assets/js/fileupload/jquery.fileupload-ui.js") }}"></script>
        <script src="{{ asset("assets/js/fileupload/jquery.my.fileupload.js") }}"></script>
    </div>
@endsection
