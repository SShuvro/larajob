@extends('layouts.main')

@section('content')
    <hr>
    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="company-profile">
                    @if(empty(Auth()->user()->company->cover_photo))
                        <img style="width: 100%"
                             src="{{asset('avatar/apple.png')}}" width="100" height="200">
                    @else
                        <img src="{{asset('uploads/cover')}}/{{Auth()->user()->company->cover_photo}}" width="1000px" height="300">
                    @endif
                </div>
                <div class="company-desc"><br>
                    @if(empty(Auth()->user()->company->logo))
                        <img style="width: 100%"
                             src="{{asset('avatar/apple.png')}}" width="100" height="200">
                    @else
                        <img style="width: 100%"
                             src="{{asset('uploads/avatar')}}/{{Auth()->user()->company->logo}}" width="100" height="200">
                    @endif
                    <h1>{{$company->cname}}</h1>
                    <p>{{$company->description}}</p>
                    <p><b>Slogan :</b>&nbsp;{{$company->slogan}}</p>
                    <p><b>Address :</b>&nbsp;{{$company->address}}</p>
                    <p><b>Phone :</b>&nbsp;{{$company->phone}}</p>
                    <p><b>Website :</b>&nbsp;{{$company->website}}</p>
                </div>
                <table class="table">
                    <thead>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    </thead>
                    <tbody>
                    @foreach($company->jobs as $job)
                        <tr>
                            <td>
                                <img src="{{asset('avatar/apple.png')}}" width="80">
                            </td>
                            <td>
                                Position: {{$job->position}}<br>
                                Job Type: <i class="fa fa-clock"></i>&nbsp;{{$job->type}}
                            </td>
                            <td>
                                <i class="fa fa-map-marker"></i>&nbsp;Address: {{$job->address}}
                            </td>
                            <td>
                                <i class="fa fa-calendar-check"></i>&nbsp;Date: {{$job->created_at->diffForHumans()}}
                            </td>
                            <td>
                                <a href="{{route('jobs.show',[$job->id,$job->slug])}}">
                                    <button class="btn btn-success btn-sm">Apply</button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
