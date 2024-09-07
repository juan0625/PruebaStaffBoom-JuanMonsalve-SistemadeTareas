import { useState, useEffect } from 'react';
import { getTasks } from '../services/taskService';

const useTasks = () => {
    const [tasks, setTasks] = useState([]);

    useEffect(() => {
        const fetchTasks = async () => {
            const data = await getTasks();
            setTasks(data);
        };
        fetchTasks();
    }, []);

    return tasks;
};

export default useTasks;
