// Generated by Selenium IDE
import org.junit.Test;
import org.junit.Before;
import org.junit.After;
import static org.junit.Assert.*;
import static org.hamcrest.CoreMatchers.is;
import static org.hamcrest.core.IsNot.not;
import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.firefox.FirefoxDriver;
import org.openqa.selenium.chrome.ChromeDriver;
import org.openqa.selenium.remote.RemoteWebDriver;
import org.openqa.selenium.remote.DesiredCapabilities;
import org.openqa.selenium.Dimension;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.interactions.Actions;
import org.openqa.selenium.support.ui.ExpectedConditions;
import org.openqa.selenium.support.ui.WebDriverWait;
import org.openqa.selenium.JavascriptExecutor;
import org.openqa.selenium.Alert;
import org.openqa.selenium.Keys;
import java.util.*;
import java.net.MalformedURLException;
import java.net.URL;
public class Admin1testjavaTest {
  private WebDriver driver;
  private Map<String, Object> vars;
  JavascriptExecutor js;
  @Before
  public void setUp() {
    driver = new ChromeDriver();
    js = (JavascriptExecutor) driver;
    vars = new HashMap<String, Object>();
  }
  @After
  public void tearDown() {
    driver.quit();
  }
  @Test
  public void admin1testjava() {
    driver.get("http://localhost/Assign%204/www40/");
    driver.manage().window().setSize(new Dimension(1550, 878));
    driver.findElement(By.name("userName")).click();
    driver.findElement(By.name("userName")).sendKeys("admin2");
    driver.findElement(By.name("password")).sendKeys("admin2");
    driver.findElement(By.name("password")).sendKeys(Keys.ENTER);
    driver.findElement(By.id("filsor")).click();
    {
      WebElement dropdown = driver.findElement(By.id("filsor"));
      dropdown.findElement(By.xpath("//option[. = 'Lecturer']")).click();
    }
    driver.findElement(By.id("filsor")).click();
    driver.findElement(By.id("filsor")).click();
    {
      WebElement dropdown = driver.findElement(By.id("filsor"));
      dropdown.findElement(By.xpath("//option[. = 'Course Number & Section']")).click();
    }
    driver.findElement(By.id("filsor")).click();
    driver.findElement(By.cssSelector("div > a:nth-child(1) > .submit")).click();
    driver.findElement(By.name("termstatus")).click();
    driver.findElement(By.name("termstatus")).sendKeys("20F Open 2545/0.2354");
    driver.findElement(By.name("cscn")).click();
    driver.findElement(By.name("cscn")).sendKeys("CS 0000.00");
    driver.findElement(By.name("craddress")).click();
    driver.findElement(By.name("craddress")).sendKeys("utdallas.edu");
    driver.findElement(By.name("ct")).click();
    driver.findElement(By.name("ct")).sendKeys("Welcome To UTD");
    driver.findElement(By.name("instructor")).click();
    driver.findElement(By.name("instructor")).sendKeys("CS");
    driver.findElement(By.cssSelector("td:nth-child(6)")).click();
    driver.findElement(By.name("instructoraddress")).click();
    driver.findElement(By.name("instructoraddress")).sendKeys("cs.utdallas.edu");
    driver.findElement(By.name("schedule")).click();
    driver.findElement(By.name("schedule")).sendKeys("Online");
    driver.findElement(By.cssSelector("input:nth-child(2)")).click();
    driver.findElement(By.cssSelector("a:nth-child(3) > .submit")).click();
    driver.findElement(By.name("cscn")).click();
    driver.findElement(By.name("cscn")).sendKeys("CS 0000.00");
    {
      WebElement element = driver.findElement(By.cssSelector("pre"));
      Actions builder = new Actions(driver);
      builder.moveToElement(element).clickAndHold().perform();
    }
    {
      WebElement element = driver.findElement(By.cssSelector("pre"));
      Actions builder = new Actions(driver);
      builder.moveToElement(element).perform();
    }
    {
      WebElement element = driver.findElement(By.cssSelector("pre"));
      Actions builder = new Actions(driver);
      builder.moveToElement(element).release().perform();
    }
    driver.findElement(By.cssSelector("pre")).click();
    driver.findElement(By.name("termstatus")).sendKeys("20F Closed 2545/0.2354");
    driver.findElement(By.name("ct")).click();
    driver.findElement(By.name("ct")).sendKeys("Welcome To UTDallas CS");
    driver.findElement(By.name("instructor")).click();
    driver.findElement(By.name("instructor")).sendKeys("CS");
    driver.findElement(By.name("schedule")).click();
    driver.findElement(By.name("schedule")).sendKeys("Still Online");
    driver.findElement(By.cssSelector("input:nth-child(2)")).click();
    driver.findElement(By.cssSelector("tr:nth-child(1) .submit")).click();
    driver.findElement(By.linkText("Logout")).click();
  }
}