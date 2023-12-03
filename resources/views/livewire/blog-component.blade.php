@section('title', 'Blogs')

<main class="main-container">
    <div class="wrap-breadcrumb">
        <ul>
            <li class="item-link"><a href="/home" title="Home">Home</a></li>
            <span class="slash">/</span>
            <li class="item-link"><span>Blogs</span></li>
        </ul>
    </div>
    <section class="blog">
      <h1>Blogs</h1>

      <div class="blog-filters">
        <div class="categories">
          <label for="category">Categories:</label>
          <select id="category">
            <option value="all">All</option>
            <option value="recipes">Recipes</option>
            <option value="tips">Tips</option>
            <option value="explore">Explore</option>
          </select>
        </div>
        <div class="sorting">
          <label for="sort">Sort By:</label>
          <select id="sort">
            <option value="latest">Latest</option>
            <option value="popular">Popular</option>
            <option value="featured">Featured</option>
          </select>
        </div>
      </div>

      @foreach ($bproducts as $bproduct)
      <div class="blog-post" data-category="recipes">
        <img src="{{ asset('assets/img/stocks') }}/{{ $bproduct->image }}" alt="{{ $bproduct->name }}">
        <h2>{{ $bproduct->name }}</h2>
        <p class="blog-date">Posted on {{ $bproduct->created_at->diffForHumans() }}</p>
        <p class="blog-excerpt">{{ $bproduct->description }}</p>
        <a href="#" class="read-more">Read More</a>
      </div>
      @endforeach
    </section>
</main>
