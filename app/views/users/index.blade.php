@extends('layouts.fundi')

@section('main')

<h1>All Users</h1>

<p>{{ link_to_route('users.create', 'Add new user') }}</p>

@if ($users->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Firstname</th>
				<th>Lastname</th>
				<th>Email</th>
				<th>Password</th>
				<th>Permissions</th>
				<th>Activated</th>
				<th>Activation_code</th>
				<th>Last_login</th>
				<th>Reset_password</th>
				<th>Image</th>
				<th>Phone</th>
				<th>About</th>
				<th>Public</th>
				<th>Views</th>
				<th>Status</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($users as $user)
				<tr>
					<td>{{{ $user->firstname }}}</td>
					<td>{{{ $user->lastname }}}</td>
					<td>{{{ $user->email }}}</td>
					<td>{{{ $user->password }}}</td>
					<td>{{{ $user->permissions }}}</td>
					<td>{{{ $user->activated }}}</td>
					<td>{{{ $user->activation_code }}}</td>
					<td>{{{ $user->last_login }}}</td>
					<td>{{{ $user->reset_password }}}</td>
					<td>{{{ $user->image }}}</td>
					<td>{{{ $user->phone }}}</td>
					<td>{{{ $user->about }}}</td>
					<td>{{{ $user->public }}}</td>
					<td>{{{ $user->views }}}</td>
					<td>{{{ $user->status }}}</td>
                    <!-- <td>{{ link_to_route('users.edit', 'Edit', array($user->id), array('class' => 'btn btn-info')) }}</td> -->
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('users.destroy', $user->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no users
@endif

@stop
