# todo-app

```html
<!DOCTYPE html>
<html>
  <head>
		<style>
      input {
				background-color: red;
			}
			.checkbox input {
				display: none;
			}
			.checkbox label:after {
				background-color: red;
				border-radius: 2.5rem;
				content: "";
				display: inline-block;
				height: 5rem;
				width: 5rem;
			}
			.checkbox input:checked + label:after {
				background-color: blue;
			}
			.navigation .menu {
				display: none;		
			}
			.navigation input:checked + .menu {
				display: block;			
			}	
		</style>
  </head>
  <body>
		<div class="navigation">
      <input id="toggler" type="checkbox">
			<div class="menu">
				Menu
			</div>
		</div>
    <div class="checkbox">
      <input id="id" type="checkbox" value="value">
      <label for="id">Label</label>
    </div>
  </body>
</html>
