 <div class="contact-form">
     <div id="success"></div>
     <form name="sentMessage" id="contactForm" novalidate="novalidate">
         <div class="control-group">
             <input type="text" class="form-control" id="name" placeholder="Your Name" required="required"
                 data-validation-required-message="Please enter your name" />
             <p class="help-block text-danger"></p>
         </div>
         <div class="control-group">
             <input type="email" class="form-control" id="email" placeholder="Your Email" required="required"
                 data-validation-required-message="Please enter your email" />
             <p class="help-block text-danger"></p>
         </div>
         <div class="control-group">
             <input type="text" class="form-control" id="subject" placeholder="Subject" required="required"
                 data-validation-required-message="Please enter a subject" />
             <p class="help-block text-danger"></p>
         </div>
         <div class="control-group">
             <textarea class="form-control" rows="6" id="message" placeholder="Message" required="required"
                 data-validation-required-message="Please enter your message"></textarea>
             <p class="help-block text-danger"></p>
         </div>
         <div>
             <button class="btn btn-primary py-2 px-4" type="submit" id="sendMessageButton">Send
                 Message</button>
         </div>
     </form>
 </div>
