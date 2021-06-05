<section class="section bg-light">
  <div class="container">
    <h2 class="mb-30">What is an Angular Template?</h2>
    <p>Angular is a component-based framework for building scalable web applications. It is built with typescript. Angular templates help you create a seamless and stunning website or web apps. Our angular admin templates are flexible, customizable, and responsive with great user interfaces and out of box design.</p>
    <p>All of our angular templates are purely on the typescript that includes all the features and functionality. With pre-added templates like login, register, angular dashboard templates, angular website templates and web apps that help you to quickly start your project.</p>
  </div>
</section>
<section class="section">
  <div class="container">
    <h3 class="mb-30">Benefits of the Angular Template</h3>
    <div class="mb-30">
      <div class="h5">Follow Best Practices</div>
      <p>All of our templates follow best code practices and structures that make our template more premium.</p>
    </div>
    <div class="mb-30">
      <div class="h5">Component-Based Structure</div>
      <p>As angular is the component-based framework we follow this approach. Our angular admin templates are divided into multiple components to make the application more customized and easy to understand code.</p>
    </div>
    <div id="read-more-1" style="display: none;">
      <div class="mb-30">
        <div class="h5">Responsive</div>
        <p>All the templates are device-friendly and easily adapt to the screen size so you do not have to make changes separately. It will automatically adjust itself according to the screen size.</p>
      </div>
      <div class="mb-30">
        <div class="h5">Great Performance</div>
        <p>When we are creating large-scale applications, performance of the application matters. With our angular template, You should not worry about the application performance. It loads fast on the browser with great performance scores.</p>
      </div>
    </div>
    <div class="mt-30">
      <a href="javascript:void(0)" class="btn btn-primary-gred read-more-link" data-href="#read-more-1">
        Read More
      </a>
    </div>
  </div>
</section>
<section class="section bg-light">
  <div class="container">
    <h3 class="mb-30">Key Features of the Angular Templates Listed on the Lettstart Design</h3>
    <div class="checklist checklist-align-top">
      <ul class="list-unstyled">
        <li>
          <i class="bx bxs-check-circle text-success h5 mb-0 mr-2 font-weight-normal"></i>
          <span>Easy customization and ready to use</span>
        </li>
        <li>
          <i class="bx bxs-check-circle text-success h5 mb-0 mr-2 font-weight-normal"></i>
          <span>Mobile, Desktop, and Tablet compatible designs</span>
        </li>
        <li>
          <i class="bx bxs-check-circle text-success h5 mb-0 mr-2 font-weight-normal"></i>
          <span>Integration of the third party application</span>
        </li>
        <li>
          <i class="bx bxs-check-circle text-success h5 mb-0 mr-2 font-weight-normal"></i>
          <span>All forms client side validations</span>
        </li>
        <li>
          <i class="bx bxs-check-circle text-success h5 mb-0 mr-2 font-weight-normal"></i>
          <span>1-year premium support</span>
        </li>
        <li>
          <i class="bx bxs-check-circle text-success h5 mb-0 mr-2 font-weight-normal"></i>
          <span>Detailed documentation with each premium template download</span>
        </li>
        <li>
          <i class="bx bxs-check-circle text-success h5 mb-0 mr-2 font-weight-normal"></i>
          <span>Built-in latest bootstrap technology</span>
        </li>
        <li>
          <i class="bx bxs-check-circle text-success h5 mb-0 mr-2 font-weight-normal"></i>
          <span>All browser compatible</span>
        </li>
        <li>
          <i class="bx bxs-check-circle text-success h5 mb-0 mr-2 font-weight-normal"></i>
          <span>Option to choose a wide range of layouts</span>
        </li>
        <li>
          <i class="bx bxs-check-circle text-success h5 mb-0 mr-2 font-weight-normal"></i>
          <span>Free Lifetime update</span>
        </li>
      </ul>
    </div>
  </div>
</section>
<section class="section">
  <div class="container">
    <div class="row no-gutters align-items-center flex-lg-row-reverse">
      <div class="col-lg-8 pl-lg-5">
        <h3 class="mb-30">How Can I Download Angular Templates?</h3>
        <p>Lettstart Design gives numerous angular templates that are ready-to-use templates that include superior features. All the templates are premium. You can purchase them from our website and add them to your server to make the web website online active.</p>
        <p>Below mentioned are some best premium angular templates: </p>
        <p><b>Marvel angular admin:</b> Marvel angular admin is a template that is built with angular version 11 and ng bootstrap. It provides a user with many possibilities for creating and customizing web applications. It has responsive designs and compatible cross-browsers. Some prominent features include dashboards, various widgets, apps, components, advanced UI, tables, charts, sidebar layouts, etc.</p>
        <p class="mb-0"><b>APIC angular admin:</b> A modern and multipurpose angular admin template, APIC is characterized by its collection of components, UI elements, clean and clear code, sidebar layouts, different pages, appealing designs, colorful tones, etc.</p>
      </div>
      <div class="col-lg-4">
        <img src="{{ url('assets/images/angular-template.jpg') }}" class="img-fluid border-radius-2x" alt="angular templates" />
      </div>
    </div>
  </div>
</section>
<section class="section bg-light">
  <div class="container">
    <h3 class="mb-30">Frequently Asked Questions</h3>
    <div class="accordion" id="accordionExample">
      @foreach($faqList[$category] as $faq)

      <div class="card active">
        <div class="card-header" id="heading{{ $loop->index }}">
          <a href="javascript:void(0)" class="accordion-toggle text-left" data-toggle="collapse"
            data-target="#collapse{{ $loop->index }}" aria-expanded="true" aria-controls="collapse{{ $loop->index }}">
            {!! $faq['question'] !!}
          </a>
        </div>

        <div id="collapse{{ $loop->index }}" class="collapse show" aria-labelledby="heading{{ $loop->index }}">
          <div class="card-body">
            {!! $faq['answer'] !!}
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>