<div class="card">
    <div class="card-header card-header-primary">
            <h4 class="card-title">Back Office info</h4>
    </div>
    <div class="card-body">                            
        <div class="alert alert-warning">
        <h4 >Tool needs to be activated before it can be used to your site</h3>
        <span class="card-category text-white op-5">
            In order to aware about what the tool is and what does it belong to, <br>
            please kindly read carefuly about the tool information once you're trying to activate
        </span>
        <div class="row">
            <div class="col-12">
                <form action="/setting/create_tool" method="post">
                {{csrf_field()}}
                    <input type="hidden" name="menu_id" value="2">
                    <input type="hidden" name="menu_name" value="Back Office">   
                    <button class="btn btn-secondary float-right" type="submit">Activate</button>
                </form>
            </div>
        </div>
        </div>    
    </div>
</div>