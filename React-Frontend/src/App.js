import React from 'react';
import TaskList from './components/TaskList';
import TaskForm from './components/TaskForm';

const App = () => {
    return (
        <div>
            <TaskForm onSave={() => window.location.reload()} />
            <TaskList />
        </div>
    );
};

export default App;
