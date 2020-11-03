<div class="section-header">
    <div class="row">
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
            <div class="section-header-breadcrumb-content">
                <h1>{{$header['title']}}</h1>


                <div class="section-header-breadcrumb">
                        @php 
                            $count = count($header['breadcrumb']); 
                            $temp = 1;
                        @endphp 
                        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}"><i class="fas fa-home"></i></a></div>

                        @foreach($header['breadcrumb'] as $key => $value)

                            @php $value = (empty($value)) ? 'javascript:;' : $value; @endphp

                            @if($temp!=$count)
                                <div class="breadcrumb-item">
                                    <a href="{{ $value }}">
                                      
                                        {{ $key }} 
                                    </a>
                                </div>
                            @else
                                    <div class="breadcrumb-item">
                                        <a href="javascript:;">{{ $key }}</a>
                                    </li>
                            @endif

                            @php $temp = $temp+1; @endphp
                        @endforeach

                </div>

            </div>
        </div>
    </div>
</div>