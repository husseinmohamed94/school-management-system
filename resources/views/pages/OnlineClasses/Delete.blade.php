<!-- Deleted inFormation Student -->
<div class="modal fade" id="Delete_Student{{$OnlineClass->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">{{trans('Subject_trans.Delete')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('online_Classes.destroy','test')}}" method="post">
                    @csrf
                    @method('DELETE')

                    <input type="hidden" name="id" value="{{$OnlineClass->id}}">
                    <input type="hidden" name="meeting_id" value="{{$OnlineClass->meeting_id}}">

                    <h5 style="font-family: 'Cairo', sans-serif;">{{trans('Subject_trans.Delete')}}</h5>
                    <input type="text" readonly value="{{$OnlineClass->topic}}" class="form-control">

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('Subject_trans.Close')}}</button>
                        <button  class="btn btn-danger">{{trans('Subject_trans.submit')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
