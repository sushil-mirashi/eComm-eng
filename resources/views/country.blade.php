@extends("master")
@section("content")

<?php 
// echo "<pre>";
// print_r($data);exit;
?>

<div class="container custom-login">
    <div class="row">
        <div class="col-sm-4 offset-sm-4">
            <form name="login" action="" method="POST">
                @csrf
                <div class="form-group">
                    <select name="countries" class="select col-12 form-control country_dropdown">
                       <option val="" disabled selected>Select Country</option>
                        @foreach ($data as $country)
                            <option value="{{$country}}">{{$country}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            {{-- <input readonly value="" class="form-control phone_code" placeholder="" name="phone_code" /> --}}
                            <label class="input-group-text" for="inputGroupSelect01"></label>
                        </div>
                        <input value="" type="text" class="form-control phone_no" placeholder="Phone No" name="phone_no" />
                      </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
        </div>
    </div>
</div>

<script>
    $(document).on('change',".country_dropdown", function(){
        console.log($(this).val());
        fetch(`http://127.0.0.1:8000/getcountrycode/${$(this).val()}`)
        .then(resp => resp.json())
        .then(res => {
            console.log(res[0].phone_code);
            // document.querySelector(".phone_code").value = `+${res[0].phone_code}`;
            $('.input-group-text').text(`+${res[0].phone_code}`);
        }).catch(e =>{
            console.log(e);
            alert('Error');
        })
    });
</script>

@endsection