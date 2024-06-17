{% extends 'layout.volt' %} 
{% block title%}
<title>Login</title>
{% endblock %}
{% block content %}
<section class="login d-flex align-items-center">
  <div class="container">
    <div class="row">
      <div class="login__form d-flex flex-column align-items-center">
        <div class="login__form--title">Login</div>
        <form id="form-login" method="post" action="/auth/login">
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label"
              >Email address</label
            >
            <input
              type="email"
              class="form-control"
              id="email1"
              name="email"
              aria-describedby="emailHelp"
              required
            />
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label"
              >Password</label
            >
            <input
              type="password"
              class="form-control"
              id="pass"
              name="pass"
              pattern=".{6,}"
              required
              title="Only letters, numbers, special @,#,_ allowed"
            />
          </div>
          <button type="submit" class="btn btn-dark">Login</button>
        </form>
      </div>
    </div>
  </div>
</section>
{% endblock %}
