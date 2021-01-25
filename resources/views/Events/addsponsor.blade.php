@include('/partials/header')
@include('/partials/navbar')

		<div class="our-login-page-content">
			<div id="login-container">
				<div class="login-page-contant">
					<form class="submit-forms" action="{{url('addevent/addsponsor/add')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <center><h1 class="new-h1">Sponsors Details</h1></center>
                        <div class="doeshavesponsor">
                            <p>Do you have any Sponsors detail ?</p>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="inlineCheckbox1" value="no">
                                <label class="form-check-label" for="inlineCheckbox1">No</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="inlineCheckbox2" value="yes" checked>
                                <label class="form-check-label" for="inlineCheckbox2">Yes</label>
                            </div>
                        </div>
                        <div class="form-group our-add-sponsor-form">
                            <label for="exampleFormControlFile1">Sponsor Image</label>
                            <input type="file" class="form-control" aria-describedby="emailHelp" accept="image/*" name="image">
                        </div>
                        <div class="form-group our-add-sponsor-form">
                            <label for="exampleFormControlTextarea1">Sponsors Details</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="details"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary btn-md btn-block">Submit</button>
					</form>
				</div>
                <p style="text-align: center; color: red">{{session('status')}}</p>
			</div>
        </div>

		@include('/partials/footer')
