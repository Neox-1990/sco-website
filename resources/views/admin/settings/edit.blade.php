@extends('admin.master.master')

@section('content')
  <h1>Settings</h1>
  @include('master.formerrors')
  <hr>

  <section class="w-100" id="adminsettings">
    <table class="table w-100">
      @foreach ($settings as $setting)
        <tr>
          <th scope="row">{{$setting['label']}}</th>
          <td>
            @if($setting['type'] == 'binary')
            <label class="admin-checkbox">
              <input type="checkbox" name="{{$setting['key']}}" value="1" {{$setting['value'] == 1 ? 'checked' : ''}}>
              <span class="admin-check"></span>
            </label>
            @elseif ($setting['type'] == 'content')
            <div class="input-group admin-textbox">
              <div class="input-group-prepend">
                <button class="btn btn-primary" type="button">save</button>
              </div>
              <input type="text" class="form-control" name="{{$setting['key']}}" value="{{$setting['value']}}">
            </div>
            @endif
          </td>
        </tr>
      @endforeach
    </table>
  </section>

@endsection
