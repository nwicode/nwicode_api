import { TestBed } from '@angular/core/testing';

import { RequestWrapperService } from './request-wrapper.service';

describe('RequestWrapperService', () => {
  let service: RequestWrapperService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(RequestWrapperService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
