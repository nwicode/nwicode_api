<form (submit) = "login()" [formGroup]="formGroup">
    <ion-item>
        <ion-label position="floating">Email</ion-label>
        <ion-input type="email" name="email" formControlName="email"></ion-input>
    </ion-item>

    <ion-item>
        <ion-label position="floating">Password</ion-label>
        <ion-input ngModel type="password" name="password" formControlName="password"></ion-input>
    </ion-item>

    <p text-right>Forgot Password?</p>

    <ion-button type="submit" expand="full" color="primary">Login</ion-button>
</form>
