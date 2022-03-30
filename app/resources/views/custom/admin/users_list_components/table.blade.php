<section class="table-section">
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <table class="table table-striped table-advance table-hover">
                    <tbody>
                    <tr>
                        <th><i class="icon_profile"></i> Name</th>
                        <th><i class="icon_calendar"></i> Date</th>
                        <th><i class="icon_mail_alt"></i> Email</th>
                        <th><i class="icon_mail_alt"></i> Email verification</th>
                        <th><i class="icon_mobile"></i> Mobile</th>
                        <th><i class="icon_cogs"></i> Action</th>
                    </tr>
                    @forelse ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>
                                @if($user->created_at==NULL)
                                    not specified
                                @else
                                    {{ $user->created_at }}
                                @endif
                            </td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @if($user->email_verified_at==NULL)
                                    not confirmed
                                @else
                                    confirmed
                                @endif
                            </td>
                            <td>
                                @if($user->phone==NULL)
                                    not specified
                                @else
                                    {{ $user->phone }}
                                @endif
                            </td>
                            <td>
                                <!-- <div class="btn-group">
                                    <a class="btn btn-primary" href="#"><i class="icon_plus_alt2"></i></a>
                                    <a class="btn btn-success" href="#"><i class="icon_check_alt2"></i></a>
                                    <a class="btn btn-danger" href="#"><i class="icon_close_alt2"></i></a>
                                </div> -->
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center"><h2>No users found</h2></td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </section>
        </div>
    </div>
</section>