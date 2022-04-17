@extends('layouts.frontLayout')

@section('title')
 Rules
@endsection

@section('content')

<div class="row mb-4 g-5">
  <div class="col-md-7">
    <h3 class="pb-4 mb-4 fst-regular border-bottom">
      <b>Traffic Rules</b>
    </h3>
    <article class="blog-post">
      
      @foreach ($dataInfo as $info)
        <p><span>Rule No. {{ $info->rule_no }} - </span>{{ $info->rule_description }}</p>
      @endforeach
      
    </article>
    {{ $dataInfo->links() }}

  </div>

  <div class="col-md-5">
    <div class="position-sticky" style="top: 2rem;">
      <div class="verification-box p-4 mb-3 bg-light rounded">
        <h4 class="fst-regular"><b>Printable</b></h4>
        <p> Verification Status</p>
        <hr>
        <form method="GET" action="{{ route('verificationpage') }}">
            @csrf
            <div class="form-group">
                <label for="exampleInputLicense">Driving License No.</label>
                <input type="text" name="driving_license" class="form-control mt-2 mb-2" id="exampleInputLincese" aria-describedby="licenseHelp" required/>
                <small id="licenseHelp" class="form-text text-muted">We'll never share your details with anyone
                    else.</small>
            </div>
            <hr>
            <button type="submit" class="printable-search">Search</button>
        </form>
    
    </div>
    </div>
  </div>
</div>

@endsection