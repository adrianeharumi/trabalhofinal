import { async, ComponentFixture, TestBed } from '@angular/core/testing';
import { IonicModule } from '@ionic/angular';

import { CommentaryPage } from './commentary.page';

describe('CommentaryPage', () => {
  let component: CommentaryPage;
  let fixture: ComponentFixture<CommentaryPage>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ CommentaryPage ],
      imports: [IonicModule.forRoot()]
    }).compileComponents();

    fixture = TestBed.createComponent(CommentaryPage);
    component = fixture.componentInstance;
    fixture.detectChanges();
  }));

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
