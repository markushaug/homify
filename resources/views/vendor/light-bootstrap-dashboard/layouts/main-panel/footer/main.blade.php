<footer class="footer">
  <div class="container-fluid">
   <nav class="pull-left">
      @section('footer-menu')
      <ul>
        <li>
          @unless(\Route::current()->getName() == 'automation')
          <a href="{{ '/automation' }}">
            Automation
          </a>
          @endunless
        </li>
      </ul>
      @show
    </nav>
    <p class="copyright pull-right">
      &copy; {{ date('Y') . '  '}} <a href="https://www.haugmarkus.de/">Markus Haug</a>  - Built for a better home
    </p>
  </div>
</footer>
