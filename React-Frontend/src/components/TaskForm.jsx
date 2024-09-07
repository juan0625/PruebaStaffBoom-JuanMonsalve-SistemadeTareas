import React, { useState } from 'react';
import { createTask, updateTask } from '../services/taskService';

const TaskForm = ({ taskToEdit, onSave }) => {
    const [title, setTitle] = useState(taskToEdit ? taskToEdit.title : '');
    const [description, setDescription] = useState(taskToEdit ? taskToEdit.description : '');
    const [dueDate, setDueDate] = useState(taskToEdit ? taskToEdit.due_date : '');

    const handleSubmit = async (e) => {
        e.preventDefault();
        if (taskToEdit) {
            await updateTask(taskToEdit.id, { title, description, due_date: dueDate });
        } else {
            await createTask({ title, description, due_date: dueDate });
        }
        onSave();
    };

    return (
        <form onSubmit={handleSubmit}>
            <label>
                Title:
                <input type="text" value={title} onChange={(e) => setTitle(e.target.value)} required />
            </label>
            <label>
                Description:
                <textarea value={description} onChange={(e) => setDescription(e.target.value)} />
            </label>
            <label>
                Due Date:
                <input type="date" value={dueDate} onChange={(e) => setDueDate(e.target.value)} required />
            </label>
            <button type="submit">{taskToEdit ? 'Update Task' : 'Create Task'}</button>
        </form>
    );
};

export default TaskForm;
