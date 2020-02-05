<form method="post" action="javascript:void(0)">
    <div class="form-row">
        <div class="form-group col-md-12">
            <label for="name" class="col-md-2">이름</label>
            <input type="text" class="form-control col-md-10" id="name" name="name" value="{{ $champion->name }}" readonly>
        </div>
    </div>
	<div class="form-row">
		<div class="form-group col-md-6 float-left">
			<div class="col-12">
				<p>별명</p>
			</div>
			<div class="col-12">
				@if($nickName->count() > 0)
					<ul>
						@foreach ($nickName as $value)
							<li>{{ $value }}</li>
						@endforeach
					</ul>
				@endif
			</div>
		</div>
        <div class="form-group col-md-6 float-left">
			<div class="col-10 float-left">
	            <label for="nick">별명</label>
	            <input type="text" class="form-control" id="nick" name="nick">
			</div>
			<div class="col-2 float-left">
				 <label for="nickAdd"></label>
				<input type="button" value="추가하기" id="nickAdd" class="btn btn-primary">
			</div>
        </div>

    </div>


    <div class="form-row">
        <div class="form-group col-md-12">
            <label for="attack">가하는 피해량</label>
            <input type="text" class="form-control" id="attack" name="attack" value="{{ $damage ? $damage->attack : '' }}">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-12">
            <label for="attacked">받는피해량</label>
            <input type="text" class="form-control" id="attacked" name="attacked" value="{{ $damage ? $damage->attacked : '' }}">
        </div>
    </div>
    <input type="submit" value="수정하기">
</form>
