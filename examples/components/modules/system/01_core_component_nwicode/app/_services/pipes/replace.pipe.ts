import { Pipe, PipeTransform } from '@angular/core';

@Pipe({
  name: 'replace'
})
export class ReplacePipe implements PipeTransform {

  transform(value: string, searchValue: string, replaceValue: string): any {
    return value.replace(searchValue, replaceValue);
  }

}
