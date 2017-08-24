@extends('master.master')

@section('main')

<div class="row d-flex align-items-stretch">
  <div class="col-lg-9 col-sm-12" id="facebookfeed">
    @foreach ($feedData as $feedElement)
      <div class="jumbotron facebook-feed-element">
        <div class="facebook-feed-element-header">
          <a href="https://www.facebook.com/{{$feedElement['id']}}" class="mr-3">Posted on <i class="fa fa-facebook-official" aria-hidden="true"></i></a>
          <span class="facebook-feed-element-date">{{(new Carbon\Carbon($feedElement['created_time']))->format('jS F Y - H:i:s')}}</span>
          @if (array_key_exists('link',$feedElement))
            <a class="btn btn-outline-primary btn-sm ml-5" href="{{$feedElement['link']}}">Link</a>
          @endif
        </div>
        <hr>
        <div class="facebook-feed-element-body">
          <p>{!!preg_replace('~(?:(https?)://([^\s<]+)|(www\.[^\s<]+?\.[^\s<]+))(?<![\.,:])~i', '<a href="$0" target="_blank" title="$0">$0</a>', $feedElement['message'])!!}</p>
        </div>
        @if (array_key_exists('full_picture',$feedElement))
          <div class="facebook-feed-element-picture">
            <img src="{{$feedElement['full_picture']}}" alt="">
          </div>
        @endif
      </div>
    @endforeach
  </div>
  <aside class="col-lg-3 col-sm-12 d-flex flex-column align-items-start align-items-stretch">
    <div class="card sco-status mt-sm-3 mt-md-0">
      <div class="card-header text-center">
        <h3>Season Status</h3>
      </div>
      <div class="card-block">
        @if ($season['curent']!==null)
          <p class="text-center"><strong>Current:</strong><br><a href="{{url('/rounds/'.$roundid)}}">{{$season['curent']}}</a></p>
          <hr>
        @endif
        <p class="text-center"><strong>Next:</strong><br><a href="{{url('/rounds/'.$roundid)}}">{{$season['next']['session']}}</a><br><small class="text-muted font-italic">in {{$season['next']['time']}}</small></p>
      </div>
    </div>
    <div class="card mt-3">
      <div class="card-block">
        <a href="https://www.coresimracing.com/"><img src="{{asset('img/core-logo.png')}}" alt="" class="img-fluid"></a>
        <hr>
        <a href="http://racespot.tv/"><img src="{{asset('img/racespot-logo.png')}}" alt="" class="img-fluid"></a>
      </div>
    </div>
    <div class="card mt-3">
      <div class="card-block">
        <h4>Donation</h4>
        <p>You like our series and want to support us? Feel free to send a donation via PayPal.</p>
        <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank" class="d-flex flex-column ">
          <input type="hidden" name="cmd" value="_s-xclick">
          <input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----MIIHfwYJKoZIhvcNAQcEoIIHcDCCB2wCAQExggEwMIIBLAIBADCBlDCBjjELMAkGA1UEBhMCVVMxCzAJBgNVBAgTAkNBMRYwFAYDVQQHEw1Nb3VudGFpbiBWaWV3MRQwEgYDVQQKEwtQYXlQYWwgSW5jLjETMBEGA1UECxQKbGl2ZV9jZXJ0czERMA8GA1UEAxQIbGl2ZV9hcGkxHDAaBgkqhkiG9w0BCQEWDXJlQHBheXBhbC5jb20CAQAwDQYJKoZIhvcNAQEBBQAEgYCEoNa5o/QtHbEhl829fTO2f9pVILftwosn3iciH5Njst9e4in7XvHw/lxGVu8jhVK69eNR5EYkUXGUcmg2/StcGgzvnw8LOu6jwDMBqdDzBJRbCl2qJg0chZBsMSmN30+Twfw/FjCRf8erri7L5gVSEPD+7BGy2/oNairN6AzDqDELMAkGBSsOAwIaBQAwgfwGCSqGSIb3DQEHATAUBggqhkiG9w0DBwQI8MsRohxYvECAgdgJp7S198tTlFTD1worPmx6kXTiUvxFCM2S2YqdTM7TM7TuVgUn5wXRc37J9BeBRp8C2fX2cJrRiaQDXfJ1uF2qbNM5QKWGLQ/PrZmIBwi//YbQJcx3fwMvDPMfw3sMotCtm7qhqNHdGlWon69u3i1FmfPgmi5U0Jxxg4nkuTtLKg2VsRMEbMjRGtCQwIcenVZozcj50HKy/LJSUMhr9iMN4bLQCGBqQaMyExVzDIGCBE6lFVZcSKyBs4Bo+HH9sNNoMbMXeXciKI7opi9G+ha+xncEOlNYIPSgggOHMIIDgzCCAuygAwIBAgIBADANBgkqhkiG9w0BAQUFADCBjjELMAkGA1UEBhMCVVMxCzAJBgNVBAgTAkNBMRYwFAYDVQQHEw1Nb3VudGFpbiBWaWV3MRQwEgYDVQQKEwtQYXlQYWwgSW5jLjETMBEGA1UECxQKbGl2ZV9jZXJ0czERMA8GA1UEAxQIbGl2ZV9hcGkxHDAaBgkqhkiG9w0BCQEWDXJlQHBheXBhbC5jb20wHhcNMDQwMjEzMTAxMzE1WhcNMzUwMjEzMTAxMzE1WjCBjjELMAkGA1UEBhMCVVMxCzAJBgNVBAgTAkNBMRYwFAYDVQQHEw1Nb3VudGFpbiBWaWV3MRQwEgYDVQQKEwtQYXlQYWwgSW5jLjETMBEGA1UECxQKbGl2ZV9jZXJ0czERMA8GA1UEAxQIbGl2ZV9hcGkxHDAaBgkqhkiG9w0BCQEWDXJlQHBheXBhbC5jb20wgZ8wDQYJKoZIhvcNAQEBBQADgY0AMIGJAoGBAMFHTt38RMxLXJyO2SmS+Ndl72T7oKJ4u4uw+6awntALWh03PewmIJuzbALScsTS4sZoS1fKciBGoh11gIfHzylvkdNe/hJl66/RGqrj5rFb08sAABNTzDTiqqNpJeBsYs/c2aiGozptX2RlnBktH+SUNpAajW724Nv2Wvhif6sFAgMBAAGjge4wgeswHQYDVR0OBBYEFJaffLvGbxe9WT9S1wob7BDWZJRrMIG7BgNVHSMEgbMwgbCAFJaffLvGbxe9WT9S1wob7BDWZJRroYGUpIGRMIGOMQswCQYDVQQGEwJVUzELMAkGA1UECBMCQ0ExFjAUBgNVBAcTDU1vdW50YWluIFZpZXcxFDASBgNVBAoTC1BheVBhbCBJbmMuMRMwEQYDVQQLFApsaXZlX2NlcnRzMREwDwYDVQQDFAhsaXZlX2FwaTEcMBoGCSqGSIb3DQEJARYNcmVAcGF5cGFsLmNvbYIBADAMBgNVHRMEBTADAQH/MA0GCSqGSIb3DQEBBQUAA4GBAIFfOlaagFrl71+jq6OKidbWFSE+Q4FqROvdgIONth+8kSK//Y/4ihuE4Ymvzn5ceE3S/iBSQQMjyvb+s2TWbQYDwcp129OPIbD9epdr4tJOUNiSojw7BHwYRiPh58S1xGlFgHFXwrEBb3dgNbMUa+u4qectsMAXpVHnD9wIyfmHMYIBmjCCAZYCAQEwgZQwgY4xCzAJBgNVBAYTAlVTMQswCQYDVQQIEwJDQTEWMBQGA1UEBxMNTW91bnRhaW4gVmlldzEUMBIGA1UEChMLUGF5UGFsIEluYy4xEzARBgNVBAsUCmxpdmVfY2VydHMxETAPBgNVBAMUCGxpdmVfYXBpMRwwGgYJKoZIhvcNAQkBFg1yZUBwYXlwYWwuY29tAgEAMAkGBSsOAwIaBQCgXTAYBgkqhkiG9w0BCQMxCwYJKoZIhvcNAQcBMBwGCSqGSIb3DQEJBTEPFw0xNzA4MjMxNzE1MzZaMCMGCSqGSIb3DQEJBDEWBBTcpIEw09USV2Vh/CnlCnRFtXm/VjANBgkqhkiG9w0BAQEFAASBgFSEpH88ZMYxqJXOgvqy/7c2d0XByC9xCL3J0+XoE/iQiZfJi0yyRyZUrmm2APvQt/KhcyDPh1nDJjgQ69SMHKM+kJgKB/a9EgTpfbq1E8FetGf3I393zY6MyBv3Xm56aySfHYL02PZ2xOBPs6+ET2ruTnCSDeWQnnV2fUYFaOI1-----END PKCS7-----
          ">
          <input class="mx-auto" type="image" src="https://www.paypalobjects.com/en_US/GB/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal – The safer, easier way to pay online!">
          <img alt="" border="0" src="https://www.paypalobjects.com/de_DE/i/scr/pixel.gif" width="1" height="1">
          </form>
      </div>
    </div>
    <div id="twitter-module" class="mt-3">
      <a class="twitter-timeline" href="{{$sco_settings['twitteraccount']}}">Tweets by Sports Car Open</a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
    </div>
  </aside>
</div>

@endsection
