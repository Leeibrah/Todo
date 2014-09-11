@extends('layouts.master')

{{-- Page title --}}
@section('title')
Account Sign in ::
@parent
@stop


@section('css')
  {{ HTML::style('assets/css/base.css') }}
  {{ HTML::style('assets/css/index.css') }}
  {{ HTML::style('assets/css/adjust.css') }}
@stop

{{-- Page content --}}
@section('main')

<div class="container-super">
  <div class="container">

    

    <div id="main" ng-app="wt" class="ng-scope">
      



      <div class="c-profile wt-clean candidate span7 centered" style="border-top:1px solid #CCC; margin-top:2%;">
      <div class="c-main">

        <h1 class="title">Get Started with Mafundis</h1>
        <div class="row-fluid">
        <div class="span6 align-center">
          <a class="btn btn-large btn-primary" href="{{ route('signup') }}">
              User
          </a>
          <h4 class="unbold _f20">I want to find a great Fundi.</h4>
        </div>
        <div class="span6 align-center">
          <a class="btn btn-large btn-primary" href="{{ route('csignup') }}">
            Fundi
          </a>
          <h4 class="unbold _f20">I want to connect with my clients.</h4>
        </div>
        </div>
        <h4 class="unbold align-center">Already have an Account <a href="{{ URL::to('auth/signin') }}">Sign In</a></h4>

      </div>
      </div>
    </div>

  </div>
</div>

@stop