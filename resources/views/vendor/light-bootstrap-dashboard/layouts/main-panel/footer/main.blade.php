<footer class="footer">
  <div class="container-fluid">
   <nav class="pull-left">
      @section('footer-menu')
      <ul>
        <li>
          <a href="{{ '/room/'.$currentRoom->room.'/edit' }}">
            Edit Things
          </a>
        </li>
      </ul>
      @show
    </nav>
    <p class="copyright pull-right">
      &copy; {{ date('Y') . '  '}} <a href="https://www.haugmarkus.de/">Markus Haug</a> 
    </p>
  </div>
</footer>
