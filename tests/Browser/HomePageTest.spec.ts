import { test, expect } from '@playwright/test';

test.describe('betterprocessmanagement.com Homepage', () => {

  test.beforeEach(async ({ page }) => {
    await page.goto('/');
  });

  test('renders hero section', async () => {
    await expect(page.locator('h1')).toContainText('Better Process Management');
  });

  test('navigation links are present', async () => {
    await expect(page.getByRole('link', { name: /home/i })).toBeVisible();
    await expect(page.getByRole('link', { name: /services/i })).toBeVisible();
    await expect(page.getByRole('link', { name: /about us/i })).toBeVisible();
    await expect(page.getByRole('link', { name: /contact/i })).toBeVisible();
  });

  test('mobile menu toggle works', async ({ page }) => {
    // Set viewport to mobile
    await page.setViewportSize({ width: 375, height: 667 });

    // Menu should be hidden initially
    const mobileNav = page.locator('nav.lg\\:hidden');
    await expect(mobileNav).not.toBeVisible();

    // Click hamburger button
    await page.locator('button[aria-label="Toggle navigation"]').click();
    await expect(mobileNav).toBeVisible();

    // Click again to close
    await page.locator('button[aria-label="Toggle navigation"]').click();
    await expect(mobileNav).not.toBeVisible();
  });

  test('Learn More button links to services', async () => {
    await page.click('text=Learn More');
    await expect(page).toHaveURL(/services/);
  });

  test('no broken images', async () => {
    const images = page.locator('img');
    const count = await images.count();
    for (let i = 0; i < count; i++) {
      await expect(images.nth(i)).not.toHaveAttribute('src', '');
    }
  });

  test('accessibility: skip link present', async () => {
    await expect(page.locator('a[href="#main-content"]')).toBeHidden(); // visually hidden
    await page.keyboard.press('Tab'); // first focusable element
    await expect(page.locator('a[href="#main-content"]')).toBeVisible();
  });

});
