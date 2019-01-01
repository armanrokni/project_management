@section('content')

    <div class="container" >
        <div  class="messaging" id="app">
            <chat-messages v-on:messagesent="addMessage"
                           :user="{{ Auth::user()->toJson() }}">
            </chat-messages>
        </div>
    </div>


@endsection