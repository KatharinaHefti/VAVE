<style>
  nav{
    height: 60px;
    display: flex;
    justify-content: space-between;
    align-items: center;
  }

  .brand{
    height: 30px;
    display: flex;
  }

  .bg{
    position: absolute;
    top: 0;
    z-index: -1;
  } 
</style>

<nav>
  <!-- brand -->
  <img class="brand" src="./img/brand.svg" alt="VAVE logo">
  <svg class="small"><use xlink:href="#icon_menu"></use></svg>  
</nav>
<img class="bg" src="./img/wave/wave1.svg" alt="wave">
