import { Component, OnInit } from '@angular/core';
import { RouterLink } from '@angular/router';
import { ApiService } from '../../services/api.service';
import { TaskInterface } from '../../interfaces/Task';
import { TaskItemComponent } from '../item/item.component';

@Component({
  selector: 'tasks-list',
  standalone: true,
  imports: [TaskItemComponent, RouterLink],
  templateUrl: './list.component.html',
})
export class TasksListComponent implements OnInit {

  constructor(private client: ApiService) { }

  tasks: TaskInterface[] = [];

  ngOnInit(): void {
    const response = this.client.request('/tasks');
    response.subscribe((data) => {
      this.tasks = data;
    });
  }
}
