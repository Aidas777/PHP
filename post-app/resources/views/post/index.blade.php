@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Posts List</div>

               <div class="card-body">
                <div class="paginate">{{$posts->links()}}</div>
                 {{--  --}}
                    <ul class="petforms-all">
                        @foreach ($posts as $post)
                        <li class="one-ownerform">
                            {{-- {{dd($post->getMember[0])}} --}}
                            <span class="one-form-data">
                                <div class="item-name"><b>{{$post->code}} </b><i><small> Town: {{$post->town}}</small></i></div>
                                <div class="little-txt txtblue"><i><b>Keeps: </b>
                                    &nbsp {{$post->getParcel[0]->weight ?? ''}} {{$post->getParcel[0]->info ?? 'not set'}}</i>
                               </div>
                            </span>
                            <div class="little-txt col-3 centr txtblue">
                                <i>capacity: {{str_replace(['{','}'], '', $post->capacity)}}</i>
                            </div>

                            <div class="btns">
                                    <a href="{{route('post.edit',[$post])}}" class="btn edit">Edit</a>

                                <form method="POST" action="{{route('post.destroy', $post)}}">
                                    @csrf
                                    <button type="submit" class="btn danger">Delete</button>
                                </form>
                                <br>
                            </div>
                        </li>
                            @endforeach
                    </ul>
                    <div class="paginate">{{$posts->links()}}</div>
                 {{--  --}}
               </div>
           </div>
       </div>
   </div>
</div>
{{-- <script>
    $(document).ready(function() {
       $('#summernote').summernote();
     });
</script> --}}

@endsection

@section('title') Posts List @endsection