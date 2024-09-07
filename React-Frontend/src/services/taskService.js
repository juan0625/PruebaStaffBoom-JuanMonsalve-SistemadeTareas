const API_URL = 'http://localhost/api/tasks';

export const getTasks = async () => {
    const response = await fetch(API_URL);
    const data = await response.json();
    return data;
};

export const createTask = async (task) => {
    await fetch(API_URL, {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(task),
    });
};

export const updateTask = async (id, task) => {
    await fetch(`${API_URL}/${id}`, {
        method: 'PUT',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(task),
    });
};

export const deleteTask = async (id) => {
    await fetch(`${API_URL}/${id}`, {
        method: 'DELETE',
    });
};
