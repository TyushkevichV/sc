
@extends('layouts.app')
@section('content')


   <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
        Добавить заказ
    </button>
    <!-- Modal -->
    <div class="modal fade"  id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="  modal-dialog modal-mid"  role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Добавление нового заказа</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>

                        <div class="form-group">
                            <label for="name">Устройство:</label>
                            <input type="text" class="form-control" id="device" required>
                            <label for="name">Производитель:</label>
                            <input type="text" class="form-control" id="manufacturer"required>
                            <label for="name">Модель:</label>
                            <input type="text" class="form-control" id="model"required>
                            <label for="name">Неисправность:</label>
                            <input type="text" class="form-control" id="fault"required>
                            <label for="name">Заметки:</label>
                            <input type="text" class="form-control" id="note" >
                            <label for="name">Номер клиента:</label>
                            <input type="number" class="form-control" id="id_client"required>
                            <label for="name">Сотрудник:</label>
                            <input type="number" class="form-control" id="id_employee"required>
                            <label for="name">Стоимость:</label>
                            <input type="number" class="form-control" id="price"required>

                        </div>

                        <center><button class="btn btn-primary btn-mid" id="addNews">Добавить</button></center>






                </form>


            </div>
            </div>
            </div>
        </div>



        <table  class="table table-bordered table-sm table-hover" style=" font-size: 10pt; ">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Устройство</th>
                <th scope="col">Производитель</th>
                <th scope="col">Модель</th>
                <th scope="col">Несиправность</th>
                <th scope="col">Заметки</th>
                <th scope="col">Дата поступления</th>
                <th scope="col">Номер клиента</th>
                <th scope="col">Сотрудник</th>
                <th scope="col">Дата отдачи</th>
                <th scope="col">Стоимость</th>

            </tr>
            </thead>

    @foreach($data as $post)
        <tbody>
        <tr>

            <th scope="row">{{$post->id}}</th>
            <td>{{$post->device}}</td>
            <td>{{$post->manufacturer}}</td>
            <td>{{$post->model}}</td>
            <td>{{$post->fault}}</td>
            <td>{{$post->note}}</td>
            <td>{{$post->created_at}}</td>
            <td>{{$post->number}}</td>
            <td>{{$post->last_name}}</td>
            <td>{{$post->date_output}}</td>
            <td>{{$post->price}}₽</td>

        </tr>

        </tbody>
        @endforeach
        </table>
   <script>

       $(document).ready(function () {
           $('#addNews').on('click', function (e) {
               e.preventDefault();
               $.ajax({


                   url: "{{ route('home.store') }}",
                   method: 'post',
                   data: {
                       device: $('#device').val(),
                       manufacturer: $('#manufacturer').val(),
                       model: $('#model').val(),
                       fault: $('#fault').val(),
                       note:  $('#note').val(),


                       id_client: $('#id_client').val(),
                       id_employee: $('#id_employee').val(),

                       price: $('#price').val(),
                       _token: '{{csrf_token()}}'
                   },

                   success: function (result) {
                       location.reload();
                   }
               });
           });
       });
   </script>









@endsection
