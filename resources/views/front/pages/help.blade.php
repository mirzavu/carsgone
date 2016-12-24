@extends('layouts.main')

@section('content')
<div class="help-container">
   <div class="container">
      <div class="row">
         <div class="col-sm-12">
            <div class="help-information">
               <h2>Help & Information</h2>
               <div class="panel">
                  <div class="panel-heading">
                     <h4>Frequently Asked Questions</h4>
                  </div>
                  <div class="panel-body">
                     <ul class="collapsible popout" data-collapsible="accordion">
                        <li>
                           <div class="collapsible-header">Q: I forgot or lost my password, how can I access my account?</div>
                           <div class="collapsible-body">
                              <p>A: You can have a new password emailed to you immediately by using the "FORGOT PASSWORD?" function below the sign-in area in the right bar. </p>
                           </div>
                        </li>
                        <li>
                           <div class="collapsible-header">Q: How many free vehicle ads am I allowed to list on theCarsgone.com website? </div>
                           <div class="collapsible-body">
                              <p>A: You may list as many vehicles as you want! However, we reserve the right to delete, remove or block any ads that conflict with the terms of use.</p>
                           </div>
                        </li>
                        <li>
                           <div class="collapsible-header">Q: How do I place my "FREE AUTO AD" on theCarsgone.com website?</div>
                           <div class="collapsible-body">
                              <p>A: Click on "LIST IT FREE", complete the ad description, and click on "Save Vehicle". Check your email and confirm your ad. Congratulations, your ad is now active!</p>
                           </div>
                        </li>
                        <li>
                           <div class="collapsible-header">Q: How do I place my ad in the "FEATURED VEHICLES" section of the main page?</div>
                           <div class="collapsible-body">
                              <p>A: After placing your FREE AD, locate your ad, click on "MAKE THIS A FEATURED VEHICLE", and make payment with a credit card or PayPal.</p>
                           </div>
                        </li>
                        <li>
                           <div class="collapsible-header">Q: Is the online payment method secure, and can I use a credit card?</div>
                           <div class="collapsible-body">
                              <p>A: PayPal is today's most widely accepted online payment method, and uses the same SSL security as most banks. Yes, you can use a credit card.</p>
                           </div>
                        </li>
                        <li>
                           <div class="collapsible-header">Q: Once I have placed my free vehicle ad online, how long will it stay active for?</div>
                           <div class="collapsible-body">
                              <p>A: Your free vehicle ad will stay active for 120 days or until it is sold and removed by you. You may remove and re-list your vehicle at any time.</p>
                           </div>
                        </li>
                        <li>
                           <div class="collapsible-header">Q: Do I have to list my phone number in my free vehicle ad?</div>
                           <div class="collapsible-body">
                              <p>A: No, you are in control of how your ad is displayed and how people may contact you. </p>
                           </div>
                        </li>
                        <li>
                           <div class="collapsible-header">Q: Can I cancel my free vehicle ad once I have sold my vehicle?</div>
                           <div class="collapsible-body">
                              <p>A: You may delete your free online vehicle ad from the website immediately after selling your vehicle, or at any time you choose.</p>
                           </div>
                        </li>
                        <li>
                           <div class="collapsible-header">Q: DoesCarsgone.com sell or share my email address with outside sources, and willCarsgone.com send me email?</div>
                           <div class="collapsible-body">
                              <p>A: Using our special contact forms, onlyCarsgone.com, and people you choose to contact through theCarsgone.com network, see your email address.Carsgone.com will not sell, rent, share or knowingly reveal your email address to parties outside of theCarsgone.com network.Carsgone.com may send email periodically.</p>
                           </div>
                        </li>
                        <li>
                           <div class="collapsible-header">Q: I live outside of one of the listed cities; can I still list a free vehicle ad on theCarsgone.com website?</div>
                           <div class="collapsible-body">
                              <p>A: Yes, theCarsgone.com website offers free car, truck, SUV, and minivan listings for any private party in all large and small Canadian cities.</p>
                           </div>
                        </li>
                        <li>
                           <div class="collapsible-header">Q: DoesCarsgone.com own any of the used vehicles posted on the site?</div>
                           <div class="collapsible-body">
                              <p>A: No, none of the used vehicles are owned byCarsgone.com. We are merely a used vehicle network designed for Canadians.</p>
                           </div>
                        </li>
                     </ul>
                  </div>
               </div>
               <div class="panel">
                  <div class="panel-heading">
                     <h4>Online Fraud and Common Scams.</h4>
                  </div>
                  <div class="panel-body">
                     <ul class="collapsible popout" data-collapsible="accordion">
                        <li>
                           <div class="collapsible-header">Overpayment Fraud</div>
                           <div class="collapsible-body">
                              <p>This is one of the most common scams encountered online today.<br /><br />
                                 How it works: Someone posing as a buyer will offer to purchase your vehicle without viewing it. They will send you a cheque for the purchase of the vehicle plus shipping, and then ask that you pay the shipping agent from theses funds. The cheque will later bounce and you will have lost all money you sent to the other party. <a href="#" target="_blank">More information.</a>
                              </p>
                           </div>
                        </li>
                        <li>
                           <div class="collapsible-header">Payment for brokerage/importing</div>
                           <div class="collapsible-body">
                              <p>A seller claims that there are brokerage fees, import duties, or other such fees required to get an item into Canada. Do not pay such fees, as you will most often never get the product and will have lost any money you paid.Carsgone.com is designed for local, in-person trading. </p>
                           </div>
                        </li>
                        <li>
                           <div class="collapsible-header">Fake escrow sites</div>
                           <div class="collapsible-body">
                              <p>A buyer or seller suggests using an escrow service to complete the transaction. Often these escrow web sites are run by fraudsters (even though they may look "official") and they will take your money and never send you the product.</p>
                           </div>
                        </li>
                        <li>
                           <div class="collapsible-header">Work from home</div>
                           <div class="collapsible-body">
                              <p>Many work from home offers are "pyramid schemes" which require you to recruit other members in order to get paid. For example, an ad may say that you can make $100 an hour by stuffing envelopes. But to make that money, you need to sell the system to others. <a href="#" target="_blank">More information.</a></p>
                           </div>
                        </li>
                        <li>
                           <div class="collapsible-header">419 Scams</div>
                           <div class="collapsible-body">
                              <p>You get an email saying that your help is needed to help take money out of a country and that you will be paid a commission for your help. Eventually they will ask you for money to help them take the large amount of money out of the country and once you pay you will never hear from them again.</p>
                           </div>
                        </li>
                     </ul>
                     <div class="help-lower-content">
                        <p>If you have any questions or concerns that were not answered or addressed, please <a href="/contact">contact us here.</a> or <a href="tel:7803286000">call us at 780-328-6000</a>.</p>
                        <p>To report a technical problem or abuse of our system, please <a href="/contact">contact us here.</a></p>
                        <p>Thank you, from the Carsgone.com support staff.</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection

@section('javascript')
@endsection