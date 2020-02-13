import { async, ComponentFixture, TestBed } from '@angular/core/testing';
import { IonicModule } from '@ionic/angular';

import { EditarPerfilProfessorPage } from './editar-perfil-professor.page';

describe('EditarPerfilProfessorPage', () => {
  let component: EditarPerfilProfessorPage;
  let fixture: ComponentFixture<EditarPerfilProfessorPage>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ EditarPerfilProfessorPage ],
      imports: [IonicModule.forRoot()]
    }).compileComponents();

    fixture = TestBed.createComponent(EditarPerfilProfessorPage);
    component = fixture.componentInstance;
    fixture.detectChanges();
  }));

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
