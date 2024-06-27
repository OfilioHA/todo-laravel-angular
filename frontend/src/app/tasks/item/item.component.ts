import { Component, Input } from '@angular/core';
import { RouterLink } from '@angular/router';
import { TaskInterface } from '../../interfaces/Task';

@Component({
  selector: '[task-item]',
  standalone: true,
  imports: [RouterLink],
  templateUrl: './item.component.html',
})
export class TaskItemComponent {
  @Input() task!: TaskInterface;
  @Input() index!: number;

  public variants = {
    'low': 'info',
    'medium': 'warning',
    'high': 'danger'
  }

}
