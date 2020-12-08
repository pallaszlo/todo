      <form method="post" action="{{route('tasks.store')}}">
          @csrf
          <div class="form-group">
              <label for="name">Description:</label>
              <input type="text" class="form-control" name="description"/>
          </div>
          <button type="submit" class="btn btn-primary">Add</button>
      </form>