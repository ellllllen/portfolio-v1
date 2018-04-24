@extends('articles.show')

@section('additional-content')
    <div class="d-flex justify-content-center flex-wrap">
        <div class="card mb-4 mx-4">
            <div class="card-body">
                <h5 class="card-title">Episode 1 and 2: Basic Data Binding</h5>
                <h6 class="card-subtitle mb-2 text-muted font-italic small">Completed: 2018-04-23</h6>
                <input type="text" v-model="message">
                <p>The value of the input is: @{{ message }}</p>
            </div>
        </div>
        <div class="card mb-4 mx-4">
            <div class="card-body">
                <h5 class="card-title">Episode 3 and 4: Lists and Vue Event Listeners</h5>
                <h6 class="card-subtitle mb-2 text-muted font-italic small">Completed: 2018-04-23</h6>
                <ul>
                    <li v-for="name in names" v-text="name"></li>
                </ul>
                <input type="text" v-model="newName">
                <button @click="addName">Add Name</button>
            </div>
        </div>
        <div class="card mb-4 mx-4">
            <div class="card-body">
                <h5 class="card-title">Episode 5: Attribute and Class Binding</h5>
                <h6 class="card-subtitle mb-2 text-muted font-italic small">Completed: 2018-04-23</h6>
                <button :class="{ 'btn btn-primary': isButtonClass }" @click="changeButtonClass">Toggle Button</button>
            </div>
        </div>
        <div class="card mb-4 mx-4">
            <div class="card-body">
                <h5 class="card-title">Episode 6: The Need for Computed Properties</h5>
                <h6 class="card-subtitle mb-2 text-muted font-italic small">Completed: 2018-04-24</h6>
                <div>
                    <h6>All tasks</h6>
                    <ul>
                        <li v-for="(task, key) in tasks">
                            @{{ task.description }}
                            <button @click="toggleTaskComplete(key)">
                                <span v-if="task.completed">Mark as incomplete</span>
                                <span v-else>Mark as complete</span>
                            </button>
                        </li>
                    </ul>

                    <h6>Completed tasks</h6>
                    <ul>
                        <li v-for="task in completedTasks" v-text="task.description"></li>
                    </ul>

                    <h6>Incompleted tasks</h6>
                    <ul>
                        <li v-for="task in incompletedTasks" v-text="task.description"></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection