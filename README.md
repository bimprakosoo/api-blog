<h1>API Service for Blog</h1>

<p>This project is a web application that provides various APIs for managing blog posts.</p>

<h2>Installation</h2>

<p>To get started with the project, follow these steps:</p>

<ol>
  <li>Clone the repository:</li>
  <pre><code>git clone https://github.com/bimprakosoo/api-blog.git</code></pre>

  <li>Change into the project directory:</li>
  <pre><code>cd first-project</code></pre>

  <li>Install the dependencies using Composer:</li>
  <pre><code>composer install</code></pre>

  <li>Set up the database by creating a new database and configuring the <code>.env</code> file with your database credentials:</li>
  <pre><code>cp .env.example .env</code></pre>
  <p>Update the <code>.env</code> file with your database information.</p>

  <li>Generate the application key:</li>
  <pre><code>php artisan key:generate</code></pre>

  <li>Migrate the database:</li>
  <pre><code>php artisan migrate</code></pre>

  <li>Optionally, seed the database with sample data:</li>
  <pre><code>php artisan db:seed</code></pre>
</ol>

<h2>APIs</h2>

<p>The following APIs are available in this project:</p>

<ul>
  <li><strong>POST /api/register</strong>: User login. It accepts the <code>name</code>, <code>email</code> and <code>password</code> parameters and returns a JSON response telling user registered succesfully.</li>
  <li><strong>POST /api/login</strong>: User login. It accepts the <code>email</code> and <code>password</code> parameters and returns a JSON response containing the access token upon successful authentication.</li>
  <li><strong>POST /api/logout</strong>: User logout. It requires the <code>Authorization</code> header with the access token to invalidate the token and perform the logout operation.</li>
  <li><strong>GET /api/post</strong>: Get all blog posts. It returns a JSON response containing a list of all blog posts.</li>
  <li><strong>GET /api/post/{id}</strong>: Get a specific blog post by ID. It accepts the <code>id</code> parameter in the URL and returns a JSON response with the details of the blog post.</li>
  <li><strong>POST /api/post/add</strong>: Create a new blog post. It accepts the <code>title</code>, <code>content</code>,<code>category_id</code>, and <code> tags_id</code> parameters in the request body and creates a new blog post.</li>
  <li><strong>PUT /api/posts/edit/{id}</strong>: Update a blog post. It accepts the <code>id</code> parameter in the URL and the <code>title</code>, <code>content</code>, <code>category_id</code>, and <code> tags_id</code> parameters in the request body to update the specified blog post.</li>
  <li><strong>DELETE /api/post/delete/{id}</strong>: Delete a blog post. It accepts the <code>id</code> parameter in the URL to delete the specified blog post.</li>
  <li><strong>POST /api/category/add</strong>: Create a new category. It accepts the <code>name</code> parameter in the request body and creates a new category.</li>
  <li><strong>GET /api/category</strong>: Get all categories. It returns a JSON response containing a list of all categories.</li>
  <li><strong>GET /api/category/{id}</strong>: Get a specific category by ID. It accepts the <code>id</code> parameter in the URL and returns a JSON response with the details of the category.</li>
  <li><strong>PUT /api/category/edit/{id}</strong>: Update a category. It accepts the <code>id</code> parameter in the URL and the <code>name</code> parameters in the request body to update the specified category.</li>
  <li><strong>DELETE /api/category/delete/{id}</strong>: Delete a category. It accepts the <code>id</code> parameter in the URL to delete the specified category.</li>  
  <li><strong>POST /api/tag/add</strong>: Create a new tag. It accepts the <code>name</code> parameter in the request body and creates a new tag.</li>
  <li><strong>GET /api/tag</strong>: Get all tags. It returns a JSON response containing a list of all categories.</li>
  <li><strong>GET /api/tag/{id}</strong>: Get a specific tag by ID. It accepts the <code>id</code> parameter in the URL and returns a JSON response with the details of the tag.</li>
  <li><strong>PUT /api/tag/edit/{id}</strong>: Update a tag. It accepts the <code>id</code> parameter in the URL and the <code>name</code> parameters in the request body to update the specified tag.</li>
  <li><strong>DELETE /api/tag/delete/{id}</strong>: Delete a tag. It accepts the <code>id</code> parameter in the URL to delete the specified tag.</li>  
  <li><strong>POST /api/post/comments</strong>: Create a new comment. It accepts the <code>post_id</code> and <code>content</code> parameters in the request body to create a new comment for a specific blog post.</li>
</ul>

<p>These APIs can be accessed using HTTP requests with the appropriate headers and parameters.</p>

<h2>License</h2>

<p>This project is licensed under the <a href="LICENSE">MIT License</a>.</p>
