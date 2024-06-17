{% extends 'layout.volt' %} {% block title%}
<title>Login</title>
{% endblock %} {% block content %}
<section class="login d-flex align-items-center">
  <div class="container">
    <div class="row">
      <div class="login__form d-flex flex-column align-items-center">
        <div class="login__form--title">Login</div>
        {% if flashSession.has('success') %}
        <div class="alert alert-success">
          {{ flashSession.output() }}
        </div>
        {% endif %} {% if flashSession.has('error') %}
        <div class="alert alert-danger">
          {{ flashSession.output() }}
        </div>
        {% endif %}
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
          <div class="d-flex flex-column">
            <button type="submit" class="btn btn-dark">Login</button>
            <div style="margin-top: 10px">
              Not have an account?<a href="/signup"> Sign up</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
{% endblock %}
