<!--
/**
* File: studentprofile.blade.php
* Path: resources/views/student/studentp;rofile.blade.php
* Purpose: To display the student profile details and its history
* Created On: 30-03-2017
* Last Modified On: 03-04-2017
* Author: MOHIT DADU
*/
-->

@extends('layouts.student')

@section('title', 'Profile')

@section('content')

  <!--about-->
  <div class="about">
    <div class="container">
      <div class="row">
        <div class="col-md-12 best-left wow fadeInLeft animated" data-wow-delay=".5s">
          <h1>My Profile</h1><hr>
          <div class="col-md-4 about-left">
            <div class="history-grid-image">
              <img src="{{ url('/') }}/studentimage?url={{ Session::get('mediaId') }}" alt="profile image" class="img-responsive img-circle pull-left">
            </div>
          </div>
          <div class="col-md-8 about-right">
            <h4>{{ $userProfile[0]->getField('ct_FullName') }}</h4><hr>
            <p>Email Address: {{ $userProfile[0]->getField('emailAddress_kqt') }}</p>
            <p>Phone Number: {{ $userProfile[0]->getField('phoneNumber_kqt') }}</p>
          </div>
          <div class="col-md-6">
            <a id="editprofile" class="btn btn-success"><i class="fa fa-edit m-right-xs"></i>Edit Profile</a>
            <br/>
            <div id="editdiv" class="well no-display">
              <form action="editprofile" method="POST">
                <div class="form-group">
                  <label for="first-name">First Name</label>
                  <input type="text" class="form-control" name="firstname" value="{{ $userProfile[0]->getField('firstName_kqt') }}">
                  @if ($errors->has('firstname'))
                    <span>
                      <strong>{{ $errors->first('firstname') }}</strong>
                    </span>
                  @endif
                </div>
                <div class="form-group">
                  <label for="last-name">Last Name</label>
                  <input type="text" class="form-control" name="lastname" value="{{ $userProfile[0]->getField('lastName_kqt') }}">
                  @if ($errors->has('lastname'))
                    <span>
                      <strong>{{ $errors->first('lastname') }}</strong>
                    </span>
                  @endif
                </div>
                <div class="form-group">
                  <label for="email">Email Address</label>
                  <input type="email" class="form-control" name="emailaddress" value="{{ $userProfile[0]->getField('emailAddress_kqt') }}">
                  @if ($errors->has('emailaddress'))
                    <span>
                      <strong>{{ $errors->first('emailaddress') }}</strong>
                    </span>
                  @endif
                </div>
                <div class="form-group">
                  <label for="phone">Phone Number</label>
                  <input type="number" class="form-control" name="phonenumber" value="{{ $userProfile[0]->getField('phoneNumber_kqt') }}">
                  @if ($errors->has('phonenumber'))
                    <span>
                      <strong>{{ $errors->first('phonenumber') }}</strong>
                    </span>
                  @endif
                </div>
                <input type="hidden" name="_token" value={{ csrf_token() }}>
                <input type="hidden" name="recordid" value="{{ $userProfile[0]->getRecordId() }}">
                <button type="submit" class="btn btn-warning pull-right">Save</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="clearfix"></div>
      <div class="about-top">
        <div class="row">
          <div class="col-md-12">
            <div class="col-md-9">
              <h2>My Answers</h2>
            </div>
            <div class="col-md-3">
              <h5><strong>Score: </strong>@php echo number_format($score, 2); @endphp %</h5>
            </div>
          </div>
          <div class="clearfix"></div>
          <hr>
          <div class="col-md-12">
            <table class="table table-responsive table-striped projects">
              <thead>
                <tr>
                  <th>Questions</th>
                  <th>Sets</th>
                  <th>Answers</th>
                </tr>
              </thead>
              <tbody>
                @if($records)
                  @foreach($records as $record)
                  <tr>
                    <td>
                      @php $question = $record->getRelatedSet('stuans_QUS'); @endphp
                      {{ $question[0]->getField('stuans_QUS::questionText_kqt') }}
                    </td>
                    <td>
                      @php $set = $record->getRelatedSet('stuans_SET'); @endphp
                      {{ $set[0]->getField('stuans_SET::setName_kqt') }}
                    </td>
                    <td>
                      @if($record->getField('studentAnswer_kqn'))
                        Right
                      @else
                        Wrong
                      @endif
                    </td>
                  </tr>

                  @endforeach
                @endif
              </tbody>
            </table>
          </div>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
  <!--//about-->

@stop

@section('footer')

    <script type="text/javascript">
      $("#editprofile").on('click', function() {
        $("#editdiv").toggle('.no-display');
      });
    </script>

@stop