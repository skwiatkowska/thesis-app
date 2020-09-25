@extends('layouts.layout-librarian')

@section('title', 'Autor '.$author->last_name." ".$author->first_names.' - informacje')


@section('content')

<div class="container col-lg-10">
    <div class="card my-1">
        <div class="h5 card-header">
            <div class="row px-2">
                Szczegóły
                <div class="ml-auto">
                    <a href="#" title="Usuń"><i class="fa fa-trash-alt"></i></a>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class=card-text">
                <ul class="list-unstyled">
                    <li><strong>Nazwisko: </strong><a class="editable-input" id="lname">{{$author->last_name}}<i class="fa fa-pencil-alt ml-2"></i></a></li>
                    <li><strong>Imiona: </strong><a class="editable-input" id="fname">{{$author->first_names}}<i class="fa fa-pencil-alt ml-2"></i></a></li>
                    <li><strong>Książki: </strong> {{$author->books->count()}}
                        <ul class="list-group mt-2">
                            @foreach ($author->books as $book)
                            <li class="list-group-item"><a href="/pracownik/ksiazki/{{$book->id}}"
                                    class="a-link-navy">{{$book->title}}</a>
                            </li>
                            @endforeach

                        </ul>
                    </li>

                </ul>
            </div>
        </div>
    </div>
</div>



<script>
    $(".editable-submit").prop('value', 'Save'); //versions newer than 1.6


    $.fn.editable.defaults.mode = 'inline';
    var id = {!! json_encode($author->id) !!};

    $(document).ready(
        function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.editable-input').editable({
                validate: function(value) {
                    if($.trim(value) == '')
                        return 'Podaj wartość';
                },
                type: 'text',
                placement: 'right',
                send:'always',
                pk: id,
                url: '/pracownik/autorzy/'+ id + '/edycja',
                ajaxOptions: {
                    dataType: 'json',
                    type: 'post'
                }
            });
        }
    );
</script>

@endsection