<div class="page-header">
  @if ( get_field('office_page_title_bg') )
    @php $page_title_photo_id = get_field('office_page_title_bg') @endphp
    @php $page_title_photo = wp_get_attachment_image_src( $page_title_photo_id, 'full' ) @endphp
    @php $page_title_photo_alt = get_post_meta($page_title_photo_id, '_wp_attachment_image_alt', true) @endphp
    <img class="page-header-img" src="@php echo $page_title_photo[0] @endphp" alt="@php echo $page_title_photo_alt @endphp">
  @endif
  <h1>{!! $title !!}</h1>
</div>

<div id="offices-single">
  <div class="container">
    <div class="row">
      <div class="col-12 col-md-6 col-left">
        <div class="office-details-container">
          <div class="office-location">
            <h3>{{ the_field('office_title') }}</h3>
            <p class="office-address">
              {{ the_field('office_address') }}<br />
              {{ the_field('office_city') }}, {{ the_field('office_state') }} {{ the_field('office_zipcode') }}
            </p>
            <p class="office-phone">
              <b>Phone: <a href='tel:{{ the_field('office_phone') }}'>{{ the_field('office_phone') }}</a></b><br />
              <b>Text: <a href='tel:{{ the_field('office_text') }}'>{{ the_field('office_text') }}</a></b>
            </p>
          </div>
          <div class="office-hours">
            <h3>Office Hours</h3>
            <p>
              {{ the_field('office_hours') }}
            </p>
            <b><a href={{ the_field('office_google_map_url') }}>Get Directions</a></b>
          </div>
        </div>
        <div class="office-map">
          {{ the_field('office_google_map_embed_code') }}
        </div>

        <div class="office-audiologists">
          <h2>Audiologists</h2>
          <ul>
            @php $office_members = get_field('members_at_office') @endphp
            @foreach( $office_members as $office_member ) 
              @php $member_title = get_field('member_title', $office_member->ID) @endphp
              @php $member_degrees = get_field('member_degrees', $office_member->ID) @endphp
              @php $permalink = get_permalink( $office_member->ID ) @endphp
              @php $title = get_the_title( $office_member->ID ) @endphp
              <li>
                <a href="{{ esc_url( $permalink ) }}">{{ $title }} - <span>{{ $member_title }} {{ $member_degrees }}</span></a>
              </li>
            @endforeach
          </ul>
        </div>

        <a href={{ the_field('google_review_url') }} class="btn btn-dark-blue" target="_blank" rel="noopener">{{ the_field('google_review_button_text') }}</a>
      </div>
      <div class="col-12 col-md-6 col-right">
        <h2>Contact {{ the_field('office_city') }}</h2>
        <p>Please call <a href="tel:{{ the_field('office_phone') }}">{{ the_field('office_phone') }}</a> or complete this form to contact an audiologist at the Cincinnati Office.</p>
        <div class="contact-form-container">
          {{-- <form accept-charset="UTF-8" action="https://jpo906.infusionsoft.com/app/form/process/5284120bc3b80bbe6d08d16e7de865b9" class="infusion-form" id="inf_form_5284120bc3b80bbe6d08d16e7de865b9" method="POST">
            <input name="inf_form_xid" type="hidden" value="5284120bc3b80bbe6d08d16e7de865b9" />
            <input name="inf_form_name" type="hidden" value="Form - Contact Us - Cincinnati" />
            <input name="infusionsoft_version" type="hidden" value="1.70.0.474484" />
            <div class="infusion-field">
              <label for="inf_field_FirstName">First Name *</label>
              <input id="inf_field_FirstName" name="inf_field_FirstName" placeholder="" type="text" />
            </div>
            <div class="infusion-field">
              <label for="inf_field_LastName">Last Name *</label>
              <input id="inf_field_LastName" name="inf_field_LastName" placeholder="" type="text" />
            </div>
            <div class="infusion-field">
              <label for="inf_field_Email">Email *</label>
              <input id="inf_field_Email" name="inf_field_Email" placeholder="" type="text" />
            </div>
            <div class="infusion-field">
              <label for="inf_field_Phone1">Phone *</label>
              <input id="inf_field_Phone1" name="inf_field_Phone1" placeholder="" type="text" />
            </div>
            <div class="infusion-field form-textarea">
              <label for="inf_custom_Howcanwehelpyou">How can we help you?</label>
              <textarea cols="24" id="inf_custom_Howcanwehelpyou" name="inf_custom_Howcanwehelpyou" placeholder="" rows="5"></textarea>
            </div>
            <div class="infusion-submit">
              <button class="infusion-recaptcha btn btn-white" id="recaptcha_5284120bc3b80bbe6d08d16e7de865b9" type="submit">Submit</button>
            </div>
          </form>
          <script type="text/javascript" src="https://jpo906.infusionsoft.app/app/webTracking/getTrackingCode"></script>
          <script type="text/javascript" src="https://jpo906.infusionsoft.com/resources/external/recaptcha/production/recaptcha.js?b=1.70.0.474484"></script>
          <script src="https://www.google.com/recaptcha/api.js?onload=onloadInfusionRecaptchaCallback&render=explicit" async="async" defer="defer"></script>
          <script type="text/javascript" src="https://jpo906.infusionsoft.com/app/timezone/timezoneInputJs?xid=f845c8cb9a25e68cfa55a191608f90ba"></script>
          <script type="text/javascript" src="https://jpo906.infusionsoft.app/app/webform/overwriteRefererJs"></script> --}}



          <form accept-charset="UTF-8" action="https://protect.spamkill.dev/v1/" class="infusion-form" id="inf_form_5284120bc3b80bbe6d08d16e7de865b9" method="POST">
            <input type="hidden" name="spamkill_formurl" id="spamkill_formurl" value="" />
            <input type="hidden" name="spamkill_version" id="spamkill_version" value="1.1" />
            <input type="hidden" name="spamkill_data2" id="spamkill_data2" value="" />
            <input type="hidden" name="spamkill_data1" id="spamkill_data1" value="" />
            <input type="hidden" name="formdata" id="formdata" value="NVJebY6rVT8pDlovyj4kugxqIsJSHmbAnzinkLleCqO499eVshw2B5h+FHbn2z+ORTPxzxOWFDlucYewNSxY5kw4E8qTXK7gddiBgpnm4/l7EQ9UJ4BtPCE+EDt/6NiAar1h//roeq5bFn4qGMbZCpTpEYLpP0gOyWAsfvkI4ekxCqRNgY6V2/v3/Xzl6QqRzDRRaFiHzqt4lys94AeGak/5guEvwdq8EQWAKdju0ddnItkQ5pD+ueRIsfU/cKWnFTc09EX8ZHhhD0h2jEFTIn1QoFl94u6ZcAFM/CL7D4T2U6105AqNjOuqBG3I4hi2pXtnNpc2UNnvGXQ5eGzpQGNKOV3rZYANOOd+tpN6n/sFI7cZ6fls8tdjNkSMJmYJigmV6BZMvyKtlVbGOAD8do2VwR8mdhE6wQG0PqMfpC9UawPxJDMN4SBMRWqXE8IOrfXAz6balWpXbR4rxS51QRMki3BcrBJ+ciP4ANVKOltXImwKgwNXOBIqDCwV/DxT3OzUKihW4csjm5ztG8YmhQfddyh2elYdKYbmrR5m8m6F0/4wNdJ7WDoqZtQzUP547PDQnfz9F0DhdgMypQPESxvql+Q6OcGHQLp0Oz56kmSuopgCoeJl4QVloDgl3sxnTGbhFSCZjgoQ2zHPViViEeajVlEkUXhcgqCnOqqhspIgkE40k28H2BWDcFNt6VioZ4Zfonvwc/vwgg7OFq0arVaseU4F8Q1AZicNQpkTdY/76+ZNpV6IkrBKfor1pzWD9n46AEqWanTU4q4K2+T1IKAHG4pXtt9UpQiUq9YqAwEjQpMLVQVEid4VpvJ41qf96unsFq3amE5hRkvLRtwohkvuwIs7z5UdAqL2eWugmfGHqofRcKs6aBMoLwiPnEJNACeAvdHDwulP5FqXMrlM7HsatCd3/QU48486Ll1XIVrEM7/G91/PYEbypznBNgBa+/Kuh64ougg0twg/YZ78yIxRqmCBUJo/385S+im6IsF5Ij38KUG5fdT0shgNOcEyAV7qv6lX2Wna9Gu3jmnZbVFhiWvLMmvyXTPTvJ71Zvst9E8Bhrbu1owbQOQSqPvm8SRjQLrgNS+IzIejBiLAlZsfaz2+LtqWvkVfbWrc8T9FGJ4xEsoUdwA01umjaGhyBCX1eI3y+rXukjlqgmvpVIHjNZn2Euqv6nAp++1DpO76IYBvVlwvm48F8KZzu03sIEOzb0Aw06oSQnrpxE2shrwHejAvQigKBx6UZ7lRjCzoLLd7kyYS5FmpWe9WuNxf" />
            <input type="hidden" name="formid" id="formid" value="302a2q3JTVWodWbs6X3pwjm2n5" />
            <input type="hidden" name="formname" id="formname" value="fb6de92i9OH8X7lDweR6WfTHCr7d2snMyKTlIQFTfdrk4Tv" />
            <div class="infusion-field">
              <label for="3uPXvRHQVvw7WVZnNRuDAIuZV58IDNpO4iYm01NWfvW">First Name *</label>
              <input tabindex="252" id="sk_MH1bpBoljBOqWgJ1gdVR7" name="MH1bpBoljBOqWgJ1gdVR7" placeholder="Your Email Address Here..." type="text"  autocomplete="a180" style="position: absolute;top: -9999px;left: -9999px;"  />
              <input id="sk_inf_field_FirstName" name="inf_field_FirstName" placeholder="inf_field_FirstName *" type="text" tabindex="404" autocomplete="off" style="position: absolute;top: -9999px; left: -9999px;" class="-aqesk" value="" novalidate="novalidate" />
              <input id="sk_3uPXvRHQVvw7WVZnNRuDAIuZV58IDNpO4iYm01NWfvW" name="3uPXvRHQVvw7WVZnNRuDAIuZV58IDNpO4iYm01NWfvW" placeholder="" type="text" tabindex="41" />
            </div>
            <div class="infusion-field">
              <label for="v3lrRLSVMlel4WuN2hxhtHKwnK7mR86syw4ejsitAEW">Last Name *</label>
              <input tabindex="265" id="sk_4GnIsk8BwsBssyMQqlv0PO" name="4GnIsk8BwsBssyMQqlv0PO" placeholder="Enter your email address" type="text"  autocomplete="a455" style="position: absolute;top: -9999px;left: -9999px;"  />
              <input id="sk_inf_field_LastName" name="inf_field_LastName" placeholder="inf_field_LastName *" type="text" tabindex="448" autocomplete="off" style="position: absolute;top: -9999px; left: -9999px;" class="-xmpoz" value="" novalidate="novalidate" />
              <input id="sk_v3lrRLSVMlel4WuN2hxhtHKwnK7mR86syw4ejsitAEW" name="v3lrRLSVMlel4WuN2hxhtHKwnK7mR86syw4ejsitAEW" placeholder="" type="text" tabindex="42" />
            </div>
            <div class="infusion-field">
              <label for="4zeWtIi8ebxrLuKi2FvpgS">Email Address *</label>
              <input tabindex="255" id="sk_30NIkyGSBro4XNIqfcerXi" name="30NIkyGSBro4XNIqfcerXi" placeholder="Enter your email address" type="text"  autocomplete="a237" style="position: absolute;top: -9999px;left: -9999px;"  />
              <input tabindex="287" id="sk_6yywWzL9eig4DZCklpUTQi" name="6yywWzL9eig4DZCklpUTQi" placeholder="Enter your email address" type="text"  autocomplete="a834" style="position: absolute;top: -9999px;left: -9999px;"  />
              <input id="sk_4zeWtIi8ebxrLuKi2FvpgS" name="4zeWtIi8ebxrLuKi2FvpgS" placeholder="" type="text" tabindex="43" />
              <input id="sk_inf_field_Email" name="inf_field_Email" placeholder="inf_field_Email *" type="text" tabindex="600" autocomplete="off" style="position: absolute;top: -9999px; left: -9999px;" class="-tknys" value="" novalidate="novalidate" />
            </div>
            <div class="infusion-field">
              <label for="Hdj2fNtZ0wpwboxDjH3XoNzx3732MdPCYm920VbCFXC">Phone Number *</label>
              <input id="sk_Hdj2fNtZ0wpwboxDjH3XoNzx3732MdPCYm920VbCFXC" name="Hdj2fNtZ0wpwboxDjH3XoNzx3732MdPCYm920VbCFXC" placeholder="" type="text" tabindex="44" />
              <input id="sk_inf_field_Phone1" name="inf_field_Phone1" placeholder="inf_field_Phone1 *" type="text" tabindex="447" autocomplete="off" style="position: absolute;top: -9999px; left: -9999px;" class="-bltxa" value="" novalidate="novalidate" />
            </div>
            <div class="infusion-field form-textarea">
              <label for="2D7usBniQtbpcFjJEejwbLOMjg3up9X3w2C8KcGRXRS">How can we help you?</label> 
              <input tabindex="284" id="sk_59LmSxSUkDGKEygMOjWCKm" name="59LmSxSUkDGKEygMOjWCKm" placeholder="Your Email Address Here..." type="text"  autocomplete="a969" style="position: absolute;top: -9999px;left: -9999px;"  />
              <textarea cols="24" id="sk_inf_custom_Howcanwehelpyou" name="inf_custom_Howcanwehelpyou" placeholder="inf_custom_Howcanwehelpyou *" rows="5" tabindex="493" autocomplete="off" style="position: absolute;top: -9999px; left: -9999px;" class="-olhgt" value="" novalidate="novalidate"></textarea>
              <textarea cols="24" id="sk_2D7usBniQtbpcFjJEejwbLOMjg3up9X3w2C8KcGRXRS" name="2D7usBniQtbpcFjJEejwbLOMjg3up9X3w2C8KcGRXRS" placeholder="" rows="5" tabindex="45"></textarea>
            </div>   
            <div class="infusion-submit">
              <button class="infusion-recaptcha btn btn-white" id="recaptcha_5284120bc3b80bbe6d08d16e7de865b9" type="submit" tabindex="54">Submit</button>
            </div>
          </form>
          <script type="text/javascript" src="https://jpo906.infusionsoft.app/app/webTracking/getTrackingCode"></script>
          <script type="text/javascript" src="https://jpo906.infusionsoft.com/resources/external/recaptcha/production/recaptcha.js?b=1.70.0.474484"></script>
          <script src="https://www.google.com/recaptcha/api.js?onload=onloadInfusionRecaptchaCallback&render=explicit" async="async" defer="defer"></script>
          <script type="text/javascript" src="https://jpo906.infusionsoft.com/app/timezone/timezoneInputJs?xid=f845c8cb9a25e68cfa55a191608f90ba"></script>
          <script type="text/javascript" src="https://jpo906.infusionsoft.app/app/webform/overwriteRefererJs"></script>
          <script type="text/javascript">document.addEventListener("DOMContentLoaded", function() {document.getElementById("spamkill_formurl").value = window.location.href; document.getElementById("inf_form_5284120bc3b80bbe6d08d16e7de865b9").addEventListener('submit', function (event) {event.stopPropagation();}, true);});</script>
          <script src="https://protect.spamkill.dev/v1/js/sodium-plus.min.js" type="text/javascript"></script>
          <script src="https://protect.spamkill.dev/v1/jscript.php" type="text/javascript"></script>
        </div>
      </div>
    </div>
  </div>
</div>
