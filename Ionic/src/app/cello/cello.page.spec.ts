import { async, ComponentFixture, TestBed } from '@angular/core/testing';
import { IonicModule } from '@ionic/angular';

import { CelloPage } from './cello.page';

describe('CelloPage', () => {
  let component: CelloPage;
  let fixture: ComponentFixture<CelloPage>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ CelloPage ],
      imports: [IonicModule.forRoot()]
    }).compileComponents();

    fixture = TestBed.createComponent(CelloPage);
    component = fixture.componentInstance;
    fixture.detectChanges();
  }));

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
