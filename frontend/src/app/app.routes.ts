import { Routes } from '@angular/router';
import { TasksListComponent } from './tasks/list/list.component';

export const routes: Routes = [
  { path: '', component: TasksListComponent },
  { path: 'create', component: TasksListComponent },
  { path: 'edit/:id', component: TasksListComponent },
];
