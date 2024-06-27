
export type priorities = 'low' | 'medium' | 'high'

export interface TaskInterface {
    id: number,
    title: string,
    description: string,
    priority: priorities,
    finished_at: Date
}